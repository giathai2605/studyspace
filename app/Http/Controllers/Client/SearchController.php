<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\UserCourse;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request, string $id = null)
    {
        $query = $request->input('query');

        // Thay thế 'Course' bằng tên thực của model trong cơ sở dữ liệu của bạn
        if ($id == null) {
            $courses = Courses::where('CourseName', 'like','%' . $query . '%')->where('CourseStatus', 1)->get();
        } else {
            $courses = UserCourse::with('course.category', 'user')
                ->where('UserID', $id)
                ->whereHas('course', function ($courseQuery) use ($query) {
                    $courseQuery->where('CourseName', 'like', '%' . $query . '%')->where('CourseStatus', 1);
                })
                ->get();
        }

        // Lấy danh sách tên khóa học từ kết quả truy vấn

        return response()->json(['courses' => $courses, 'hasId' => $id !== null]);
    }
}
