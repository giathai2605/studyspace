<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';
    protected $fillable = [
        'content',
        'user_id',
        'receiver_id',
        'status_message_id',
        'read_at',
    ];
    function statusMessage()
    {
        return $this->belongsTo(StatusMessage::class);
    }
    function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    use HasFactory;
}
