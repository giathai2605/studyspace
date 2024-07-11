<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comments extends Model
{
    use HasFactory;
    protected $table = "comments";
    protected $fillable = [
        'UserId',
        'LessonId',
        'Content',
        'Image',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'UserId');
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class, 'LessonId');
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class, 'CommentId');
    }



}
