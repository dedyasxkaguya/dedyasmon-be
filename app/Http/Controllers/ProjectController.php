<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public static function index()
    {
        return response()->json(Project::all());
    }

    public static function show($id)
    {
        return response()->json(Project::find($id));
    }

    public static function storeData(Request $request)
    {
        $data = new Project;
        $data->user = User::find($request->user_id);
        $data->user_id = $request->user_id;
        $data->data = json_decode($request->data);

        $data->save();

        return response()->json($data);
    }

    public static function delete($id)
    {
        Project::find($id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil Menghapus Projek dengan ID' .$id,
        ]);
    }
}
