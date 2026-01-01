<?php

namespace App\Models;

use Dom\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{

    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['formatted_date'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function siswa(){
        return $this->belongsTo(Siswa::class);
    }
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    public function getFormattedDateAttribute(){
        return $this->created_at ? $this->created_at->diffForHumans() : 'Tidak ada data';
    }
}
