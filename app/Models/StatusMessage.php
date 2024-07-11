<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusMessage extends Model
{
    protected $table = 'status_message';
    protected $fillable = [
        'name',
    ];
    use HasFactory;
}
