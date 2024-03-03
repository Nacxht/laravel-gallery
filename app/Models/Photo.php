<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillabl = [
        'title',
        'description',
        'uploaded_at',
        'filename',
        'album_id',
        'user_id'
    ];
}
