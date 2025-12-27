<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public static function index(){
        return response()->json(Category::all());
    }
    public static function show(Category $category){
        return response()->json($category);
    }
}
