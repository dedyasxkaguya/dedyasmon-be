<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $casts = [
        'activity' => 'array',
        'subject_0' => 'array',
        'subject_1' => 'array',
        'subject_2' => 'array',
        'subject_3' => 'array',
    ];
}
