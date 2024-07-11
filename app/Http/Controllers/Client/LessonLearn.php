<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\Note;
use App\Models\Comments;
use App\Models\UserLessonNotes;
use App\Models\UserPractice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonLearn extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $data = Lesson::with(['practices.testcases', 'videos'],['chapter.course'])->find($id);
        $notes = UserLessonNotes::with('note')->where('lessonID', $id)->where('userID', auth()->id())->first();
        $practiceDone = UserPractice::with('practice')->where('UserID', auth()->id())->where('isDone', 1)->get();
        $comments = Comments::join('users', 'users.id', '=', 'comments.UserID')
            ->select('comments.id', 'comments.UserID', 'comments.Content', 'comments.Image', 'comments.created_at', 'users.username', 'users.firstname','users.lastname','users.avatar')
            ->where('LessonID', $id)
            ->get();
        foreach ($comments as $comment) {
            $replyComments = DB::table('reply_comments')
                ->join('users', 'users.id', '=', 'reply_comments.UserID')
                ->select('reply_comments.id', 'reply_comments.UserID', 'reply_comments.Content', 'reply_comments.Image', 'reply_comments.created_at', 'users.username', 'users.firstname','users.lastname','users.avatar')
                ->where('reply_comments.CommentID', $comment->id)
                ->get();
            $comment->replyComments = $replyComments;
        }
        return view('client.course-watch', compact('data', 'notes', 'practiceDone','comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        $data = $request->all();

        // Kiểm tra xem người dùng đã có note cho bài học này chưa
        $userLessonNote = UserLessonNotes::where('userID', auth()->id())
            ->where('lessonID', $id)
            ->first();

        if (!$userLessonNote) {
            // Nếu chưa có, tạo một note mới
            $note = new Note();
            $note->noteContent = $data['noteContent'];
            $note->save();

            // Lưu thông tin userLessonNote
            $userLessonNote = new UserLessonNotes();
            $userLessonNote->userID = auth()->id();
            $userLessonNote->lessonID = $id;
            $userLessonNote->noteID = $note->id;
            $userLessonNote->save();
        } else {
            // Nếu đã có, cập nhật nội dung của note
            $note = Note::find($userLessonNote->noteID);
            $note->noteContent = $data['noteContent'];
            $note->save();
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateNote(Request $request, string $id)
    {
        $data = $request->all();
        $note = Note::where('id', $id)->first();
        if ($note) {
            $note->update($data);
        } else {
            Note::create($data);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
