<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\TeacherComment;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public static function index() {
        $data = Teacher::all();
        foreach($data as $d){
            $totalrating = 0;
            $comment = TeacherComment::where('teacher_id',$d->id)->get();
            $d->comments = $comment;
            foreach($comment as $c){
                $totalrating+=$c->rating;
            }
            if(count($comment) !== 0){
                $d->rating = round($totalrating/count($comment),1);
            }else{
                $d->rating = 0;
            }
        }
        return response()->json($data);
    }
    public static function show($id){
        $data = Teacher::find($id);
        $comment = TeacherComment::where('teacher_id',$id)->get();
        $data->comments = $comment;
        $totalrating = 0;
        foreach($comment as $c){
            $totalrating+=$c->rating;
        }
        if(count($comment) == 0){
            return response()->json($data);
        }
        $data->rating = round($totalrating/count($comment),1);
        return response()->json($data);

    }
}
