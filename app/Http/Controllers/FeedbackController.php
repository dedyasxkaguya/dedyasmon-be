<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public static function index()
    {
        return response()->json(Feedback::latest()->with('user')->with('siswa')->get());
    }

    public static function show(Feedback $feedback)
    {
        // return response()->json($feedback->with('user')->with('siswa')->get());
        return response()->json($feedback->load('user')->load('siswa'));
    }

    public static function storeData(Request $request)
    {
        $data = [
            'isUlasan' => $request->isUlasan,
            'isBug' => $request->isBug,
            'isData' => $request->isData,
            'isSaran' => $request->isSaran,
            'user_id' => $request->user_id,
            'rating' => $request->rating,
            'text_ulasan' => $request->text_ulasan,
            'page_bug' => $request->page_bug,
            'text_bug' => $request->text_bug,
            'siswa_id' => $request->siswa_id,
            'collumn_wrong' => $request->collumn_wrong,
            'data_wrong' => $request->data_wrong,
            'data_right' => $request->data_right,
            'page_fitur' => $request->page_fitur,
            'text_fitur' => $request->text_fitur,
        ];
        $status = Feedback::create($data)->save();

        return response()->json($status);
    }
}
