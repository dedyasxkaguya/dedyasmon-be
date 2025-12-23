<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Pest\Support\Str;

class UserController extends Controller
{
    public static function index(){
        return response()->json(User::all());
    }
    public static function show($slug){
        return response()->json(User::where('slug',$slug)->first());
    }
    public static function detail($id){
        return response()->json(User::find($id));
    }
    public static function storeData(Request $request){
        $data = new User();
        $data->name = $request->name;
        $data->username = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->slug = Str::random(8);
        $data->role = 'USER';
        $data->save();
        return response()->json(['status'=>true,'data'=>$data],201);
    }
    public static function login(Request $request) {
        $credential = $request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);

        $data = Auth::attempt($credential);
        if($data){
            $user = User::where('email',$request->email)->first();
            return response()->json([
                "status"=>$data,
                "user"=>$user
            ]);
        }else{
            return response()->json([
                'status'=>$data,'text'=>'Wrong email or password'
            ]);
        }
    }
}
