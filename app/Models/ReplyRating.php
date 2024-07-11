<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyRating extends Model
{
    use HasFactory;
    protected $table = 'reply_rating';
    protected $fillable = [
        'UserID',
        'RatingID',
        'Comment',
    ];
}
