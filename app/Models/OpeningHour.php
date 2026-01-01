<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpeningHour extends Model
{
    protected $fillable = [
        'day',
        'opens_at',
        'closes_at',
        'is_closed'
    ];

    protected $casts = [
        'is_closed' => 'boolean'
    ];
}
