<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestCase extends Model
{
    protected $table = "testcase";
    protected $fillable = [
        'PracticeLessonID',
        'NameFunction',
        'InputDetail',
        'Input',
        'ExpectOutput',
        'SortNumber',
    ];
    public function practicelessons(): BelongsTo
    {
        return $this->belongsTo(PracticeLessons::class, 'PracticeLessonID', 'id');
    }
    use HasFactory;
}
