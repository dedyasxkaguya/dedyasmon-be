<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\SubjectComment;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public static function index(){
        $data = Subject::all();
        foreach($data as $d){
            $d->comments = SubjectComment::where('subject_id',$d->id)->get();
        }
        return response()->json($data);
    }
    public static function show($id) {
        $data = Subject::find($id);
        $data->comments = SubjectComment::where('subject_id',$data->id)->get();
        return response()->json($data);
    }
}
