<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $casts = [
        'data'=>'array',
        'user'=>'array'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}


