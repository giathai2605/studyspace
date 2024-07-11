<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;
    protected $table = "rating";
    protected $fillable = [
        'UserID',
        'CourseID',
        'Rating',
        'Comment',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'id');
    }
    public function course()
    {
        return $this->belongsTo(Courses::class, 'CourseID', 'id');
    }

}
