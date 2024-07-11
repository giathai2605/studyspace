<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chapter extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'course_chapters';
    protected $fillable = [
        'CourseID',
        'ChapterName',
        'ChapterTotalTime',
        'ChapterLessonCount',
        'SortNumber',
    ];

    public function lessons(): HasMany
    {
        // Sắp xếp theo sort number
        return $this->hasMany(Lesson::class, 'CourseChapterId', 'id')->orderBy('SortNumber');
    }
    public function courses(): BelongsTo
    {
        return $this->belongsTo(Courses::class, 'CourseID', 'id');
    }
}
