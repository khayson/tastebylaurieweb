<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PastEvent extends Model
{
    protected $fillable = [
        'title',
        'location',
        'event_date',
        'description',
        'cover_image',
        'gallery'
    ];

    protected $casts = [
        'event_date' => 'date',
        'gallery' => 'array'
    ];
}
