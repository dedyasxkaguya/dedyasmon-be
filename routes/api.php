<?php

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SubjectCommentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [UserController::class,'index']);
Route::get('/user/{slug}', [UserController::class,'show']);
Route::get('/user/detail/{id}', [UserController::class,'detail']);

Route::get('/students', [SiswaController::class,'index']);
Route::get('/students/min', [SiswaController::class,'indexsmall']);
Route::get('/student/{slug}', [SiswaController::class,'show']);
Route::get('/student/detail/{id}/{len}', [SiswaController::class,'detail']);

Route::get('/teachers', [TeacherController::class,'index']);
Route::get('/teacher/{id}', [TeacherController::class,'show']);

Route::get('/subjects', [SubjectController::class,'index']);
Route::get('/subject/{id}', [SubjectController::class,'show']);

Route::get('/comment/subjects', [SubjectCommentController::class,'index']);
Route::get('/comment/subject/{id}', [SubjectCommentController::class,'show']);

// POST

Route::post('/user/register', [UserController::class,'storeData']);
Route::post('/user/login', [UserController::class,'login']);