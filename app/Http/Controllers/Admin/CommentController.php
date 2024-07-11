<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\ReplyComment;
use App\Models\User;
use App\Models\Lesson;
use mysql_xdevapi\Exception;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:comments.index', ['only' => ['index']]);
        $this->middleware('permission:comments.show', ['only' => ['show']]);
        $this->middleware('permission:comments.destroy', ['only' => ['destroy']]);
    }

    public function index()
    {
        $comments = Comments::join('users', 'users.id', '=', 'comments.UserID')
            ->join('lessons', 'lessons.id', '=', 'comments.LessonID')
            ->join('courses', 'courses.id', '=', 'lessons.CourseID')
            ->select('comments.id', 'comments.UserID', 'comments.Content', 'comments.Image', 'comments.created_at', 'users.username', 'users.firstname', 'users.lastname', 'users.roleID', 'lessons.LessonName', 'courses.CourseName')
            ->paginate(10);

        return view('admin.comment.index', compact('comments'));
    }

        public function getByLesson($id)
        {
            $comments = Comments::join('users', 'users.id', '=', 'comments.UserID')
            ->join('lessons', 'lessons.id', '=', 'comments.LessonID')
            ->join('courses', 'courses.id', '=', 'lessons.CourseID')
            ->select('comments.id', 'comments.UserID', 'comments.Content', 'comments.Image', 'comments.created_at', 'users.username', 'users.firstname', 'users.lastname', 'users.roleID', 'lessons.LessonName', 'courses.CourseName')
            ->where('comments.LessonID', $id)
                ->paginate(10);

            return view('admin.comment.index', compact('comments'));
        }

        public function show($id)
        {
            $comments = Comments::join('users', 'users.id', '=', 'comments.UserID')
                ->join('lessons', 'lessons.id', '=', 'comments.LessonID')
                ->select('comments.id', 'comments.UserId', 'comments.Content', 'comments.Image', 'comments.created_at', 'users.username', 'users.firstname', 'users.lastname', 'users.avatar', 'lessons.LessonName')
                ->where('comments.id', $id)
                ->get();

            $replyComments = ReplyComment::join('users', 'users.id', '=', 'reply_comments.UserID')
                ->select('reply_comments.id', 'reply_comments.UserID', 'reply_comments.Content', 'reply_comments.Image', 'reply_comments.created_at', 'users.username', 'users.firstname', 'users.lastname', 'users.avatar')
                ->where('reply_comments.CommentID', $id)
                ->get();

            return view('admin.comment.show', compact('comments', 'replyComments'));
        }

        public function destroy($id)
        {
            $comment = Comments::find($id);
            $comment->delete();
        }
    }
