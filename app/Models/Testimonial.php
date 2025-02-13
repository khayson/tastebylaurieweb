<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'client_name',
        'client_avatar',
        'message',
        'event_type',
        'event_date',
        'is_featured'
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_featured' => 'boolean'
    ];
}
