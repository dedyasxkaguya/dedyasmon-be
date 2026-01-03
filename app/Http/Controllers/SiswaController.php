<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public static function index()
    {
        return response()->json(Siswa::all());
    }
    public static function indexsmall()
    {
        $data = DB::select('SELECT id,name,nis FROM siswas');
        return response()->json($data);
    }

    public static function show($slug)
    {
        return response()->json(Siswa::where('slug', $slug)->with('user')->first());
    }

    public static function detail($id, $len)
    {
        if ($len == 'min') {
            // return response()->json(Siswa::find($id));
            $data = Siswa::find($id);
            return response()->json([
                'id'=>$data->id,
                'name'=>$data->name,
                'nis'=>$data->nis,
                'asal_sekolah'=>$data->asal_sekolah,
                'tempat_lahir'=>$data->tempat_lahir,
                'tanggal_lahir'=>$data->tanggal_lahir,
            ]);
        } else {
            return response()->json(Siswa::find($id));
        }
    }
    public static function update(Request $request){
        $siswa = Siswa::find($request->id);
        $siswa->name = $request->name;
        $siswa->user->username = $request->username;
        $siswa->nis = $request->nis;
        $siswa->nisn = $request->nisn;
        $siswa->asal_sekolah = $request->asal_sekolah;
        $siswa->user->email = $request->email;
        $siswa->tempat_lahir = $request->tempat_lahir;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->alamat = $request->alamat;

        $siswa->push();
        return response()->json($siswa);
    }
}
