<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiDocumentationController;

Route::get('/', [ApiDocumentationController::class,'index']);
Route::get('/docs', [ApiDocumentationController::class,'dynamicIndex']);

Route::get('/api-docs', [ApiDocumentationController::class, 'index'])->name('api.docs');