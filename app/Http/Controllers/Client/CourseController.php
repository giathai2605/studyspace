<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Courses;
use App\Models\UserCourse;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    const OBJECT = 'newclient.dashboard.courses';
    const DOT = '.';
    public function index(string $id)
    {
        $data = UserCourse::query()
            ->with('course.category')
            ->with('user')
            ->where('UserID', $id)
            ->whereHas('course', function ($courseQuery) {
                $courseQuery->where('CourseStatus', 1);
            })
            ->get();
        $categories = Category::query()->get();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('data', 'categories'));
    }

    public function all(Request $request)
    {
        $categories = Category::query()->get();
        if ($request->isMethod('post')) {
           $data = $this->filterCourses($request->all());
        } else {
            $data = Courses::with('category')->where('CourseStatus', 1)
                ->orderByDesc('created_at')
                ->paginate(8);
        }
        return view('newclient.student.courses.index', compact('data', 'categories'));
    }

    public function filterCourses(array $data){
        $query = Courses::query()->with('category');

        if (isset($data['Rating'])) {
            $query->join('rating', 'rating.CourseID', '=', 'courses.id')
                ->select('courses.*')
                ->where('rating.Rating', '=', $data['Rating']);
        }
        if (isset($data['CategoryID'])) {
            $query->where('CategoryID', $data['CategoryID']);
        }

        if (isset($data['keyword'])) {
            $query->where('CourseName', 'like', '%' . $data['keyword'] . '%');
        }
        $query->where('CourseStatus', 1);
        return $query->orderByDesc('created_at')->paginate(8);
    }

    public function filterByCategory(string $id)
    {
        if ($id == 0) {
            $data = UserCourse::query()->with('course.category')->with('user')->where('UserID', auth()->id())->get();
            return response()->json($data);
        } else {
            $data = UserCourse::query()->with('course.category')->with('user')->where('UserID', auth()->id())->whereHas('course', function ($query) use ($id) {
                $query->where('CategoryID', $id);
            })->get();
            return response()->json($data);
        }
    }
    public function detail($id)
    {
        $data = Courses::with('chapters.lessons.practices')
            ->where('id', $id)
            ->first();
        $ratings = Rating::join('users', 'users.id', '=', 'rating.UserID')
            ->select('rating.*', 'rating.id as ratingID')
            ->where('CourseID', $id)
            ->get();
        $seller = Courses::join('users', 'users.id', '=', 'courses.UserID')
            ->select('users.*')
            ->where('courses.id', $id)
            ->first();
        if (auth()->user() != null) {
            $isRegistered = UserCourse::where('UserID', auth()->user()->id)
                ->where('CourseID', $id)
                ->count();
            $userCourse = UserCourse::where('UserID', auth()->user()->id)
                ->where('CourseID', $id)
                ->count();
        } else {
            $isRegistered = 0;
            $userCourse = 0;
        }
        return view('newclient.detail.index', compact('data', 'userCourse', 'ratings', 'seller', 'isRegistered'));
    }

    public function filterCate($id)
    {
        $data = Courses::with('category')
            ->where('CategoryID', $id)
            ->where('CourseStatus', 1)
            ->orderByDesc('created_at')
            ->paginate(8);
        $categories = Category::query()->get();
        return view('newclient.student.courses.index', compact('data', 'categories'));
    }
}
