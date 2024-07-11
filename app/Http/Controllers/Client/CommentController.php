<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comments;
use App\Models\ReplyComment;
use App\Models\Courses;
use App\Models\UserCourse;

class CommentController extends Controller
{

    protected $pusher;

    public function __construct()
    {
        $this->pusher = new \Pusher\Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            array(
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => true
            )
        );
    }

    public function create(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        if ($request->hasFile('Image')) {
            $image = $request->file('Image');
            $newFileName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/comments'), $newFileName);
            $imageFilePath = 'uploads/comments/' . $newFileName;
            $data['Image'] = $imageFilePath;
        }
        try {
            $data['UserID'] = Auth::user()->id;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            Comments::insert($data);
            $comment = Comments::join('users', 'users.id', '=', 'comments.UserID')
                ->select('comments.id', 'comments.UserID', 'comments.Content', 'comments.Image', 'comments.created_at', 'users.username', 'users.firstname', 'users.lastname', 'users.avatar')
                ->where('comments.id', Comments::max('id'))
                ->get();
            $authData = [
                'auth_id' => Auth::user()->id,
                'auth_username' => Auth::user()->username,
                'auth_firstname' => Auth::user()->firstname,
                'auth_lastname' => Auth::user()->lastname,
                'auth_avatar' => Auth::user()->avatar,
            ];
            $comment[0]['auth'] = $authData;
            $this->pusher->trigger('comment-channel', 'new-comment', $comment);
            return response()->json(['success' => 1, 'message' => 'Reply to comment successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 0, 'message' => $e->getMessage()]);
        }
    }

    public function reply(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        try {
            $data['UserID'] = Auth::user()->id;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            if ($request->hasFile('Image')) {
                $image = $request->file('Image');
                $newFileName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads/comments'), $newFileName);
                $imageFilePath = 'uploads/comments/' . $newFileName;
                $data['Image'] = $imageFilePath;
            }
            ReplyComment::insert($data);
            $reply = ReplyComment::join('users', 'users.id', '=', 'reply_comments.UserID')
                ->select('reply_comments.id', 'reply_comments.UserID', 'reply_comments.Content', 'reply_comments.created_at', 'reply_comments.CommentID', 'reply_comments.Image', 'users.username', 'users.firstname', 'users.lastname', 'users.avatar')
                ->where('reply_comments.id', ReplyComment::max('id'))
                ->get();
            $this->pusher->trigger('reply-comment-channel', 'new-reply', $reply);
            echo json_encode(['success' => true, 'message' => 'Reply to comment successfully']);
        } catch (\Throwable $th) {
            echo json_encode(['status' => 0, 'message' => $th]);
        }
    }
}
