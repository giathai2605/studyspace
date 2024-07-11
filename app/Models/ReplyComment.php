<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReplyComment extends Model
{
    use HasFactory;
    protected $table = "reply_comments";
    protected $fillable = [
        'CommentId',
        'UserId',
        'Content',
        'Image',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'UserId');
    }
    public function comments(): BelongsTo
    {
        return $this->belongsTo(Comments::class, 'CommentId');
    }

}
