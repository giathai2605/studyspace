<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Courses extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'courses';

    protected $fillable = [
        'UserID',
        'CategoryID',
        'CourseCode',
        'CourseName',
        'CourseSubTitle',
        'Slug',
        'Price',
        'Discount',
        'ImageData',
        'LessonCount',
        'ChapterCount',
        'RegisterCount',
        'DoneCount',
        'CourseStatus',
        'IntroVideoLink'
    ];
    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class, 'CourseID', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'CategoryID', 'id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'UserID', 'id');
    }
}
