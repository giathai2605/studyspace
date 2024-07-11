<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

if (!function_exists('upload_file')) {
    function upload_file($folder, $file)
    {
        return 'storage/' . Storage::put($folder, $file);
    }
}

if (!function_exists('delete_file')) {
    function delete_file($pathFile)
    {
        $pathFile = str_replace('storage/', '', $pathFile);
        return Storage::exists($pathFile) ? Storage::delete($pathFile) : null;
    }
}
function checkExist($item, $validate, $request, $rule)
{
    if ($request->has($item)) {
        $validate[$item] = $rule;
    }
}

if (!function_exists('check_user_has_course')) {
    function check_user_has_course($course_id)
    {
        if (Auth::check()) {
            $user_course = \App\Models\UserCourse::where('UserID', Auth::user()->id)->where('CourseID', $course_id)->first();
            if ($user_course) {
                return true;
            }
            return false;
        }
        return false;
    }
}

if (!function_exists('timeAgo')) {
    function timeAgo($timestamp)
    {
        $timestamp = strtotime($timestamp);
        $current_time = time();
        $diff = $current_time - $timestamp;

        $minute = 60;
        $hour = 60 * $minute;
        $day = 24 * $hour;
        $week = 7 * $day;
        $month = 30 * $day;

        if ($diff < $minute) {
            $time_ago = 'Just now';
        } elseif ($diff < $hour) {
            $time_ago = floor($diff / $minute) . ' minutes ago';
        } elseif ($diff < $day) {
            $time_ago = floor($diff / $hour) . ' hours ago';
        } elseif ($diff < $week) {
            $time_ago = floor($diff / $day) . ' days ago';
        } elseif ($diff < $month) {
            $time_ago = floor($diff / $week) . ' weeks ago';
        } else {
            $time_ago = floor($diff / $month) . ' months ago';
        }

        return $time_ago;
    }
}

if (!function_exists('showTime')) {
    function showTime($time)
    {
        $date = new DateTime($time);
        $dayOfWeek = $date->format('N'); // Lấy số thứ tự của ngày trong tuần (1 đến 7)
        $dayOfWeekNames = ["", "T2", "T3", "T4", "T5", "T6", "T7", "CN"];

        $day = $dayOfWeekNames[$dayOfWeek];
        $hours = $date->format('h');
        $minutes = $date->format('i');
        $ampm = $date->format('a');
        if ($ampm == 'pm') {
            $hours = $hours + 12;
        }
        $strTime = $day . ', ' . $hours . ':' . $minutes;
        return $strTime;
    }
}

if (!function_exists('get_user')) {
    function get_user($id)
    {
        return \App\Models\User::find($id);
    }
}

if (!function_exists('get_course')) {
    function get_course($id)
    {
        return \App\Models\Courses::find($id);
    }
}

if (!function_exists('get_category')) {
    function get_category($id)
    {
        return \App\Models\Category::find($id);
    }
}

if (!function_exists('get_lesson')) {
    function get_lesson($id)
    {
        return \App\Models\Lesson::find($id);
    }
}

if (!function_exists('format_currency')) {
    function format_currency($number)
    {
        return number_format($number, 0, ',', '.') . 'đ';
    }
}

//rating functions
if (!function_exists('get_rating')) {
    function get_rating($course_id)
    {
        $ratings = \App\Models\Rating::where('CourseID', $course_id)->get();
        $total = 0;
        foreach ($ratings as $rating) {
            $total += $rating->Rating;
        }
        if (count($ratings) == 0) {
            return 0;
        }
        return $total / count($ratings);
    }
}

if (!function_exists('get_reply_rating')) {
    function get_reply_rating($rating_id)
    {
        return \App\Models\ReplyRating::join('users', 'users.id', '=', 'reply_rating.UserID')
            ->where('RatingID', $rating_id)
            ->get();
    }
}

if (!function_exists('count_rating')) {
    function count_rating($course_id)
    {
        return \App\Models\Rating::where('CourseID', $course_id)->count();
    }
}

if (!function_exists('count_reply_rating')) {
    function count_reply_rating($rating_id)
    {
        return \App\Models\ReplyRating::where('RatingID', $rating_id)->count();
    }
}

if (!function_exists('format_rating')) {
    function format_rating($rating)
    {
        for ($i = 1; $i <= 5; $i++) {
            if ($i <= $rating) {
                echo '<i class="fas fa-star filled"></i>';
            } else {
                echo '<i class="far fa-star"></i>';
            }
        }
    }

    if (!function_exists('count_courses_by_rating')) {
        function count_courses_by_rating()
        {
            $counts = [
                '5' => 0,
                '4' => 0,
                '3' => 0,
                '2' => 0,
                '1' => 0,
            ];
            $courses = \App\Models\Courses::all();
            foreach ($courses as $course) {
                $average_rating = get_rating($course->id);
                if ($average_rating >= 4.5) {
                    $counts['5']++;
                } elseif ($average_rating >= 3.5) {
                    $counts['4']++;
                } elseif ($average_rating >= 2.5) {
                    $counts['3']++;
                } elseif ($average_rating >= 1.5) {
                    $counts['2']++;
                } elseif ($average_rating >= 0.5) {
                    $counts['1']++;
                }
            }
            return $counts;
        }
    }

    if (!function_exists('average_rating')) {
        function average_rating()
        {
            $ratings = \App\Models\Rating::all();
            $ratingCount = \App\Models\Rating::count();
            $total = 0;
            foreach ($ratings as $ratings) {
                $total += $ratings->Rating;
            }
            if ($ratingCount == 0) {
                return 0;
            }
            return round($total / $ratingCount, 2);
        }
    }

    if (!function_exists('count_comment_by_lesson')) {
        function count_comment_by_lesson($lesson_id)
        {
            return \App\Models\Comments::where('LessonID', $lesson_id)->count();
        }
    }

    //count courses
    if (!function_exists('count_courses')) {
        function count_courses()
        {
            return \App\Models\Courses::count();
        }
    }
}

if (!function_exists('getTotalPracticesUserCompleteInCourse')) {
    function getTotalPracticesUserCompleteInCourse($courseId, $userId)
    {
        $completedPracticesCount = \App\Models\UserPractice::whereHas('practice.lesson.chapter.courses', function ($query) use ($courseId) {
            $query->where('courses.id', $courseId);
        })
            ->where('UserID', $userId)
            ->where('isDone', 1)
            ->count();

        return $completedPracticesCount;
    }
}

if (!function_exists('getTotalPracticesInCourse')) {
    function getTotalPracticesInCourse($courseId)
    {
        $totalPracticesCount = \App\Models\PracticeLessons::whereHas('lesson.chapter.courses', function ($query) use ($courseId) {
            $query->where('courses.id', $courseId);
        })
            ->count();

        return $totalPracticesCount;
    }
}

if (!function_exists('CalculatePercentageUserComplete')) {
    function CalculatePercentageUserComplete($courseId, $userId)
    {
        $completedPracticesCount = getTotalPracticesUserCompleteInCourse($courseId, $userId);
        $totalPracticesCount = getTotalPracticesInCourse($courseId);

        if ($totalPracticesCount == 0) {
            return 0;
        }
        return round($completedPracticesCount / $totalPracticesCount * 100);
    }
}

if (!function_exists('addCertificate')) {
    function addCertificate($courseId, $userId)
    {
        $checkAvailable = \App\Models\Certificate::where('userID', $userId)->where('courseID', $courseId)->first();
        $checkCondition = \App\Models\UserCourse::where('courseID', $courseId)->where('isDone', 1)->first();
        if ($checkAvailable) {
            return;
        }
        if ($checkCondition) {
            $certificate = new \App\Models\Certificate();
            $certificate->userID = $userId;
            $certificate->courseID = $courseId;
            $certificate->status = 1;
            $certificate->save();
        }
        return;
    }
}

if (!function_exists('getVideoUrlFromEmbedCode')) {
    function getVideoUrlFromEmbedCode($embedCode)
    {
        $videoUrl = '';
        $videoUrl = explode('src="', $embedCode);
        $videoUrl = explode('"', $videoUrl[1]);
        $videoUrl = $videoUrl[0];
        return $videoUrl;
    }
}

if (!function_exists('count_review')) {
    function count_review()
    {
        return \App\Models\Rating::count();
    }
}

//hàm kiểm tra xem người dùng đã hoàn thành hết practice trong lesson chưa
if (!function_exists('checkUserCompleteAllPracticeInLesson')) {
    function checkUserCompleteAllPracticeInLesson($lessonId, $userId)
    {
        $practices = \App\Models\PracticeLessons::where('LessonID', $lessonId)->get();
        if ($practices->count() == 0) {
            return false;
        }
        foreach ($practices as $practice) {
            $check = \App\Models\UserPractice::where('UserID', $userId)->where('PracticeLessonID', $practice->id)->first();
            if (!$check) {
                return false;
            }
        }
        return true;
    }
}
//hàm đếm xem có bao nhiêu học viên tham gia khóa học
if(!function_exists('countUserJoinCourse')){
    function countUserJoinCourse($courseId){
        $userCourses = \App\Models\UserCourse::where('courseID', $courseId)->get();
        return $userCourses->count();
    }
}
//đếm xem khóa học có bao nhiêu chapter
if(!function_exists('countChapterInCourse')){
    function countChapterInCourse($courseId){
        $chapters = \App\Models\Chapter::where('CourseID', $courseId)->get();
        return $chapters->count();
    }
}
//đêm xem khóa học có bao nhiêu bài học
if(!function_exists('countLessonInCourse')){
    function countLessonInCourse($courseId){
        $lessons = \App\Models\Lesson::whereHas('chapter', function ($query) use ($courseId) {
            $query->where('CourseID', $courseId);
        })->get();
        return $lessons->count();
    }
}
