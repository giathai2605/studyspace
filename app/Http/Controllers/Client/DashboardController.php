<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Certificate;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use App\Models\Courses;
use App\Models\VideoDoneData;
use App\Models\UserCourse;
use App\Models\Wishlist;

class DashboardController extends Controller
{
    public function index()
    {
        $profile = Auth::user();
        $coursesAttended = UserCourse::query()->where('UserID', $profile->id)->get()->count();
        $videoDone = VideoDoneData::query()->where('UserID', $profile->id)->count();
        $isDoneCourse = UserCourse::query()->where('UserID', $profile->id)->where('isdone', 1)->count();
        $isLikedCourse  = Wishlist::query()->where('UserID', $profile->id)->count();
        $donePercent = DB::table('user_courses')
            ->join('courses', 'user_courses.CourseID', '=', 'courses.id')
            ->select('user_courses.UserID', 'courses.CourseName', 'user_courses.DonePercent')
            ->where('user_courses.UserID', $profile->id)
            ->get();
        return view('newclient.dashboard.my_dashboard.index', compact('profile', 'videoDone', 'isDoneCourse', 'coursesAttended', 'donePercent','isLikedCourse'));
    }

    public function editProfile(Request $request, string $id)
    {
        $user = Auth::user();
        if ($id != $user->id) {
            return redirect()->route('client.dashboard.index');
        }
        return view('newclient.dashboard.edit_profile.index', compact('user'));
    }

    public function updateProfile(Request $request, string $id)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:users,email,' . $id,
                'firstName' => 'required',
                'lastName' => 'required',
                'username' => 'required|unique:users,username,' . $id,
                'phone' => 'required|regex:/^\d{10}$/',
                'birthday' => 'required|date|before:today',
            ], [
                'email.required' => 'Email không được để trống',
                'email.email' => 'Email không đúng định dạng',
                'email.unique' => 'Email đã tồn tại',
                'firstName.required' => 'Họ không được để trống',
                'lastName.required' => 'Tên không được để trống',
                'username.required' => 'Tên đăng nhập không được để trống',
                'username.unique' => 'Tên đăng nhập đã tồn tại',
                'phone.required' => 'Số điện thoại không được để trống',
                'phone.regex' => 'Số điện thoại không đúng định dạng',
                'birthday.required' => 'Ngày sinh không được để trống',
                'birthday.date' => 'Ngày sinh không đúng định dạng',
                'birthday.before' => 'Ngày sinh không được lớn hơn ngày hiện tại',
            ]);

            $model = User::find($id);
            if (!$model) {
                return response()->json(['message' => 'User not found'], 404);
            }
            $model->fill($request->except('avatar', 're-password'));
            if ($request->hasFile('avatar')) {
                if (!strpos($model->avatar, "default")) {
                    delete_file($model->avatar);
                }
                $model->avatar = upload_file(OBJECT_USER, $request->file('avatar'));
            }
            $model->save();
            return response()->json([
                'status' => 1,
                'message' => 'Cập nhật thông tin thành công'
            ], 200);
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json([
                'status' => 0,
                'message' => $errors
            ], 422);
        }
    }

    public function orderHistory()
    {
        return view('newclient.dashboard.order.index');
    }
}
