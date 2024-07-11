<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificate extends Model
{
    protected $table = 'certificates';
    protected $fillable = [
        'userID',
        'courseID',
        'description',
        'status',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'userID', 'id');
    }
    public function course(): BelongsTo
    {
        return $this->belongsTo(Courses::class, 'courseID', 'id');
    }
    use HasFactory;
}
