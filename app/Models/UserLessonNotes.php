<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserLessonNotes extends Model
{
    protected $fillable = [
        'userID',
        'lessonID',
        'noteId',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userID', 'id');
    }

    public function note(): BelongsTo
    {
        return $this->belongsTo(Note::class, 'noteId', 'id');
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class, 'lessonID', 'id');
    }

    use HasFactory;
}
