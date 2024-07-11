<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    public function index()
    {
        $data = Message::query()
            ->with('user.role')
            ->where(function ($query) {
                $query->where('user_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id());
            })
            ->orderBy('created_at', 'desc')
            ->get();
        return response()->json($data);
    }

//    private function getSenders()
//    {
//        return Message::select('user_id')
////            ->with(['user.role' => function ($query) {
////                $query->where('name', 'User');
////            }])
////            ->where('receiver_id', auth()->id())
//            ->groupBy('user_id')
//            ->get();
//    }
    private function getSenders()
    {
        $senders = Message::select('user_id', DB::raw('MAX(created_at) as latest_message_time'))
            ->with('user')
            ->whereHas('user.role', function ($query) {
                $query->where('id', 4);
            })
            ->groupBy('user_id')
            ->orderByDesc('latest_message_time') // Sắp xếp theo thời gian của tin nhắn cuối cùng giảm dần
            ->get();
        return $senders;
    }
    private function getLatestMessage($senderId)
    {
        return Message::where('user_id', $senderId)
//            ->where('receiver_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->first()->toArray();
    }
    private function getSendersWithLatestMessages()
    {
        $senders = $this->getSenders();

        $sendersWithLatestMessages = [];
        foreach ($senders as $sender) {
            $latestMessage = $this->getLatestMessage($sender->user_id);
            $senderWithLatestMessage = $sender->toArray();
            $senderWithLatestMessage['latest_message'] = $latestMessage;
            $sendersWithLatestMessages[] = $senderWithLatestMessage;
        }

        return $sendersWithLatestMessages;
    }
    public function getInbox()
    {
        $senders = $this->getSenders();

        $lastMessages = [];
        foreach ($senders as $sender) {
            $lastMessages[] = $this->getLatestMessage($sender->user_id);
        }
//        dd($lastMessages[0]['content']);
        $this->pusher->trigger('chat', 'MessageSent', $senders);
        return view('newclient.student.message.index', compact('senders', 'lastMessages'));
    }

    public function getChatWithUser($id)
    {
        $messages = Message::with('user')
            ->where(function ($query) use ($id) {
                $query->where('receiver_id', $id);
            })->orWhere(function ($query) use ($id) {
                $query->where('user_id', $id);

            })->orderBy('created_at', 'asc')->get();
        $this->pusher->trigger('chat', 'MessageSent', $messages);
        $senders = $this->getSendersWithLatestMessages();
        return response()->json([
            'messages' => $messages,
            'senders' => $senders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function sendMessage(Request $request)
    {
        $model = new Message();
        $model->fill($request->all());
//        dd($model);
        $model->save();
        $data = Message::query()
            ->with('user.role')
            ->where(function ($query) {
                $query->where('user_id', auth()->id())
                    ->orWhere('receiver_id', auth()->id());
            })
            ->orderBy('created_at', 'asc')
            ->get();
        $senders = $this->getSendersWithLatestMessages();
        $pusherData = [
            'messages' => $data,
            'senders' => $senders,
        ];
        $this->pusher->trigger('chat', 'MessageSent', $pusherData);
//        $this->pusher->trigger('chat', 'MessageSent', $data);
        return response()->json([
            'messages' => $data,
            'senders' => $senders,
        ]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
