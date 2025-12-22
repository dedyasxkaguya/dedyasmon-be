<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public static function index() {
        return response()->json(Teacher::all());
    }
    public static function show($id){
        return response()->json(Teacher::find($id));
    }
}
