<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public static function index()  {
        return response()->json(Photo::all());
    }
    public static function show($id)  {
        return response()->json(Photo::find($id));
    }
    public static function storeData(Request $request) {
        $data = new Photo();
        $user = User::where('slug',$request->user)->first();
        $data->user = $user;
        $data->title = $request->title;
        $image = $request->file('image')->store('/images');
        $data->image = $image;

        $data->save();
        
        return response()->json([$data,$user,$request],);
    }
}
