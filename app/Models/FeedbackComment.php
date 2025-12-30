<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedbackComment extends Model
{
    /** @use HasFactory<\Database\Factories\FeedbackCommentFactory> */
    use HasFactory;
    public function feedback(){
        return $this->belongsTo(Feedback::class);
    }
}
