<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Models\Courses;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\UserCourse;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index($id)
    {
        $data = Courses::join('users', 'users.id', '=', 'courses.UserID')
            ->where('courses.id', $id)
            ->first(['courses.*', 'users.lastName as author']);
        $count = Chapter::join('lessons', 'lessons.CourseChapterId', '=', 'course_chapters.id')->where('course_chapters.CourseID', $id)->count();
        return view('client.checkout', compact(['data', 'count']));
    }

    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function payment(Request $request)
    {
        $user_id = Auth::user()->id;
        $total_momo = $request->total_momo;
        $course_id = $request->course_id;
        $respone = $this->payment_momo($total_momo, $course_id, $user_id);
        if ($respone['resultCode'] == 0) {
            return redirect()->to($respone['payUrl']);
        } else {
            return view('newclient.failCheckout');
        }
    }
    public function payment_momo($total_momo, $course_id, $user_id)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOTCNN20240105_TEST';
        $accessKey = 'jier6A5LsUGsZXGn';
        $serectkey = 'GbVJZy9XzirvQ6ENiMCcMKmZpYKj3SzG';
        $orderInfo = "Thanh toán qua MoMo";
        $amount = intval($total_momo) < 1000 ? 1000 : intval($total_momo);
        $orderId = "MOMO" . time();
        $redirectUrl = route('momo.return',['id'=>$course_id,'user_id'=>$user_id]);
        $ipnUrl = "https://webhook.site/b3088a6a-2d17-4f8d-a383-71389a6c600b";
        $extraData = "";
        $requestId = "MOMO" . time();
        // $requestType = "payWithATM";
        $requestType = "captureWallet";
        // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
        //before sign HMAC SHA256 signature
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
        $signature = hash_hmac("sha256", $rawHash, $serectkey);
        $data = array(
            'partnerCode' => $partnerCode,
            'partnerName' => "Test",
            "storeId" => "MomoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        );
        $result = $this->execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($result, true);
        return $jsonResult;
    }

    public function checkout_momo($id,$user_id)
    {
        $secretKey = 'GbVJZy9XzirvQ6ENiMCcMKmZpYKj3SzG'; //Put your secret key in there
        $accessKey = 'jier6A5LsUGsZXGn'; //Put your access key in there

        $partnerCode = $_GET["partnerCode"];
        $requestId = $_GET["requestId"];
        $amount = $_GET["amount"];
        $orderInfo = $_GET["orderInfo"];
        $orderType = $_GET["orderType"];
        $transId = $_GET["transId"];
        $orderId = $_GET["orderId"];
        $resultCode = $_GET["resultCode"];
        $message = $_GET["message"];
        $payType = $_GET["payType"];
        $responseTime = $_GET["responseTime"];
        $extraData = $_GET["extraData"];
        $m2signature = $_GET["signature"];
        $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&message=" . $message . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo .
            "&orderType=" . $orderType . "&partnerCode=" . $partnerCode . "&payType=" . $payType . "&requestId=" . $requestId . "&responseTime=" . $responseTime .
            "&resultCode=" . $resultCode . "&transId=" . $transId;
        $partnerSignature = hash_hmac("sha256", $rawHash, $secretKey);
        if ($m2signature == $partnerSignature) {
            if ($resultCode == 0) {
                $course = Courses::find($id);
                $user_course = new UserCourse();
                $user_course->UserID = $user_id;
                $user_course->CourseID = $id;
                $user_course->isDone = 0;
                $user_course->GrandTotal = $course->Price - $course->Price * $course->Discount / 100;
                $user_course->LastTimeStudy = date('Y-m-d H:i:s');
                $user_course->RegisterTime = date('Y-m-d H:i:s');
                $user_course->DonePercent = 0;
                $user_course->save();
                // Gửi thông báo cho người dùng
                if ($user_course->save()) {
                    $user = get_user($user_id);
                    $course = get_course($id);
                    $message = "Bạn đã đăng ký khoá học " . $course->CourseName . " thành công";
                    $user->notify(new \App\Notifications\AddToUserCourse($message));
                    Session::flash('success', 'Đăng ký khoá học thành công');
                } else {
                    Session::flash('error', 'Đăng ký khoá học thất bại');
                }
                return redirect()->route('detail.courses',['id'=>$id]);
            } else {
                return view('newclient.failCheckout');
            }
        }
        return view('newclient.failCheckout');
    }
}
