<?php

namespace App\Http\Controllers;

use App\Models\SubjectComment;
use Illuminate\Http\Request;

class SubjectCommentController extends Controller
{
    public static function index(){
        return response()->json(SubjectComment::all());
    }
    public static function show($id){
        return response()->json(SubjectComment::find($id));
    }
}
