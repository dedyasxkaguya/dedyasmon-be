<?php

namespace App\Http\Controllers;

use App\Models\TeacherComment;
use Illuminate\Http\Request;

class TeacherCommentController extends Controller
{
    public static function index(){
        return response()->json(TeacherComment::all());
    }
    public static function show($id){
        return response()->json(TeacherComment::find($id));
    }
    public static function storeData(Request $request){
        $data = new TeacherComment();
        $data->username = $request->username;
        $data->teacher_id = $request->teacher_id;
        $data->rating = $request->rating;
        $data->text = $request->text;

        $data->save();

        return response()->json($data);
    }
}
