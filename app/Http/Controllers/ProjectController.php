<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public static function index()
    {
        $data = Project::with('category')->latest()->get();
        return response()->json($data);
    }

    public static function show(Project $project)
    {
        $project->load('category');
        return response()->json($project);
    }

    public static function showCategory($id)
    {
        return response()->json(Project::where('category_id',$id)->get()->load('category'));
    }

    public static function storeData(Request $request)
    {
        $data = new Project;
        $data->user = User::find($request->user_id);
        $data->user_id = $request->user_id;
        $data->category_id = $request->category_id;
        $data->data = json_decode($request->data);

        $data->save();

        return response()->json($data);
    }

    public static function delete(Project $project)
    {
        $project->delete();

        return response()->json([
            'status' => true,
            'message' => 'Berhasil Menghapus Projek dengan ID'.$project->id,
        ]);
    }
}
