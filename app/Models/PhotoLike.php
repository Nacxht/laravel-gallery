<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_id',
        'user_id',
        'liked_at',
    ];
}
