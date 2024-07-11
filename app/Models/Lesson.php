<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class Lesson extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'lessons';
    protected $fillable = [
        'CourseChapterId',
        'LessonName',
        'LessonDescription',
        'VideoTime',
        'SortNumber',
        'Status',
        'CourseID',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $dates = ['deleted_at'];
    public function practices(): HasMany
    {
        return $this->hasMany(PracticeLessons::class, 'LessonID', 'id');
    }
    public function videos(): HasMany
    {
        return $this->hasMany(LessonVideo::class, 'LessonID', 'id');
    }
    public function userLessonNotes(): HasMany
    {
        return $this->hasMany(UserLessonNotes::class, 'lessonID', 'id');
    }
    public function chapter(): BelongsTo
    {
        return $this->belongsTo(Chapter::class, 'CourseChapterId', 'id');
    }
}
