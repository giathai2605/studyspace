<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Courses;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class WishlistController extends Controller
{
    protected $wishlist;
    public function __construct()
    {
        $this->middleware('auth');
        $this->wishlist = new Wishlist();
    }
    public function index()
    {
    if(Auth::check()){
        $user = auth()->user();
        $wishlist = Wishlist::where('UserID', $user->id)->get();
        $courses = [];
        foreach ($wishlist as $item) {
            $course = Courses::find($item->CourseID);
            array_push($courses, $course);
        }
    }else{
        $courses = [];
    }
        return view('newclient.student.wishlist.index', compact('courses'));
    }

    public function addWishlist(Request $request)
    {
        $user = auth()->user();
        $course = Courses::find($request->course_id);
        $wishlist = Wishlist::where('UserID', $user->id)->where('CourseID', $course->id)->first();

        if ($wishlist) {
            $wishlist->delete();
            return response()->json([
                'success' => 1,
                'is_wishlist' => 0,
                'message' => 'Đã xóa khóa học khỏi mục ưa thích!'
            ]);
        }else{
            $wishlist = new Wishlist();
            $wishlist->UserID = $user->id;
            $wishlist->CourseID = $course->id;
            $wishlist->save();
            return response()->json([
                'success' => 1,
                'is_wishlist' => 1,
                'message' => 'Đã lưu khóa học vào mục ưa thích!'
            ]);
        }

    }
    public function addWishlistwithGet($id)
    {
        $user = auth()->user();
        $course = Courses::find($id);
        $wishlist = Wishlist::where('UserID', $user->id)->where('CourseID', $course->id)->first();

        if ($wishlist) {
            $wishlist->delete();
            return response()->json([
                'success' => true,
                'is_wishlist' => false,
                'message' => 'Đã xóa khóa học khỏi mục ưa thích!'
            ]);
        } else {
            $wishlist = new Wishlist();
            $wishlist->UserID = $user->id;
            $wishlist->CourseID = $course->id;
            $wishlist->save();
            return response()->json([
                'success' => true,
                'is_wishlist' => true,
                'message' => 'Đã lưu khóa học vào mục ưa thích!'
            ]);
        }
    }
}
