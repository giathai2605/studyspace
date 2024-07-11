<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPractice extends Model
{
     protected $table = 'practice_done_data';
    protected $fillable = [
        'UserID',
        'PracticeLessonID',
        'DoneTime',
        'isDone',
    ];
    public function practice(): BelongsTo
    {
        return $this->belongsTo(PracticeLessons::class, 'PracticeLessonID', 'id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'UserID', 'id');
    }
    use HasFactory;
}
