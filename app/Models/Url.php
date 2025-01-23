<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = [
        'original_url',
    ];

    protected $casts = [
        'last_requested_at' => 'datetime',
    ];
}
