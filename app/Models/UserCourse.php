<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserCourse extends Model
{
    protected $fillable = [
        'UserID',
        'CourseID',
        'isDone',
        'GrandTotal',
        'LastTimeStudy',
        'RegisterTime',
        'DonePercent',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'UserID', 'id');
    }
    public function course(): BelongsTo
    {
        return $this->belongsTo(Courses::class, 'CourseID', 'id');
    }
    use HasFactory;
}
