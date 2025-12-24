<?php

namespace App\Http\Controllers;

use App\Models\Schedule;

class ScheduleController extends Controller
{
    public static function index()
    {
        return response()->json(Schedule::all());
    }
    public static function show($id)  {
        return response()->json(Schedule::find($id));
    }
}
