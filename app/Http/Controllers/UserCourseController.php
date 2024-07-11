<?php

namespace App\Http\Controllers;
use App\Models\UserCourse;
use App\Models\Courses;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class UserCourseController extends Controller
{
    //
    public function addToUserCourse($id,$user_id){
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
    if($user_course->save()){
        $user = get_user($user_id);
        $course = get_course($id);
        $message = "Bạn đã đăng ký khoá học " . $course->CourseName . " thành công";
        $user->notify(new \App\Notifications\AddToUserCourse($message));
        Session::flash('success', 'Đăng ký khoá học thành công');
    }
    else{
        Session::flash('error', 'Đăng ký khoá học thất bại');
    }
        return redirect()->route('home');
    }

    public function myCourses()
    {
        $courses = DB::table('user_courses')
            ->join('courses', 'user_courses.CourseID', '=', 'courses.id')
            ->select('courses.id','user_courses.UserID', 'courses.CourseName', 'courses.ImageData', 'courses.CourseSubTitle', 'courses.Price', 'courses.Discount', 'user_courses.DonePercent', 'user_courses.LastTimeStudy', 'user_courses.RegisterTime', 'user_courses.isDone', 'user_courses.GrandTotal', 'courses.LessonCount', 'courses.ChapterCount')
            ->where('user_courses.UserID', auth()->user()->id)
            ->get();
        return view('newclient.student.purchase_history.index', compact('courses'));
    }
}
