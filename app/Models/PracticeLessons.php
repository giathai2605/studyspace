<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PracticeLessons extends Model
{
    protected $table = "practice_lessons";
    protected $fillable = [
        'Problem',
        'ProblemDetail',
        'Explain',
        'Suggest',
        'LessonID',
    ];
    use HasFactory;
    public function testcases(): HasMany
    {
        return $this->hasMany(TestCase::class, 'PracticeLessonID', 'id');
    }
    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class, 'LessonID', 'id');
    }
}
