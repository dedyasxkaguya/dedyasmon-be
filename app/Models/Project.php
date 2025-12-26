<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $casts = [
        'data'=>'array',
        'user'=>'array'
    ];
}


