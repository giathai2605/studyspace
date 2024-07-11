<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Courses;
use App\Models\UserCourse;
use App\Models\Feedback;
use App\Models\Rating;
use App\Models\Lesson;
use App\Models\LessonVideo;
use App\Http\Requests\LessonRequest;
use App\Models\Chapter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
use App\Models\Document;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $total_amount = UserCourse::sum('GrandTotal');
        //thong ke theo khoang thoi gian
        if ($request->startMonth  && $request->endMonth) {
            $startMonth = Carbon::createFromFormat('Y-m', $request->startMonth)->startOfMonth();
            $endMonth = Carbon::createFromFormat('Y-m', $request->endMonth)->endOfMonth();
        } else {
            $startMonth = now()->subMonths(11)->startOfMonth();
            $endMonth = now()->endOfMonth();
        }
        $monthlyTotals = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyTotals[$i] = ['month' => $i, 'total' => 0];
        }
        $data = UserCourse::select(
            DB::raw('MONTH(RegisterTime) as month'),
            DB::raw('SUM(GrandTotal) as total')
        )
            ->whereBetween('RegisterTime', [$startMonth, $endMonth])
            ->groupBy(DB::raw('MONTH(RegisterTime)'))
            ->get();

        foreach ($data as $item) {
            $monthlyTotals[$item->month] = ['month' => $item->month, 'total' => $item->total];
        }
        $monthlyStatisticsTotal = collect($monthlyTotals);


        if ($request->revenueDay) {
            $revenueDay = Carbon::createFromFormat('Y-m-d', $request->revenueDay)->format('Y-m-d');
        } else {
            $revenueDay =  today()->format('Y-m-d');
        }
      //thong ke theo ngay (tra ve date va total)
        $todayRevenue = UserCourse::select(
            DB::raw('DATE(RegisterTime) as date'),
            DB::raw('SUM(GrandTotal) as total')
        )
            ->whereDate('RegisterTime', $revenueDay)
            ->groupBy(DB::raw('DATE(RegisterTime)'))
            ->get();
            if($todayRevenue->isEmpty()){
                $todayRevenue = collect([['date' => $revenueDay, 'total' => 0]]);
            }
        $users_count = User::count();
        $user_blocked_count = User::where('userStatusID', 0)->count();
        $new_users_count = User::whereDate('created_at', date('Y-m-d'))->count();
        $courses_count = Courses::count();
        $new_courses_count = Courses::whereDate('created_at', date('Y-m-d'))->count();
        $rating_count =  Rating::count();
        $new_rating_count =  Rating::whereDate('created_at', date('Y-m-d'))->count();
        return view('admin.index', compact('users_count', 'new_users_count', 'user_blocked_count', 'courses_count', 'new_courses_count', 'total_amount', 'rating_count', 'new_rating_count', 'monthlyStatisticsTotal', 'todayRevenue'));
    }

    public function allOrders()
    {
        $orders = UserCourse::join('users', 'users.id', '=', 'user_courses.UserID')->join('courses', 'courses.id', '=', 'user_courses.CourseID')->select('user_courses.*', 'users.lastName', 'users.firstName', 'courses.UserID as sellerID', 'courses.CourseName as courseName')->orderByDesc('RegisterTime')->paginate(10);
        return view('admin.history.index', compact('orders'));
    }
}
