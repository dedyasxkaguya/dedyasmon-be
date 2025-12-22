<?php

namespace App\Http\Controllers;

use App\Models\Siswa;

class SiswaController extends Controller
{
    public static function index()
    {
        return response()->json(Siswa::all());
    }

    public static function show($slug)
    {
        return response()->json(Siswa::where('slug', $slug)->first());
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
}
