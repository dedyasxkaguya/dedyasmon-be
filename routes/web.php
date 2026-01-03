<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiDocumentationController;

// Route::get('/', [ApiDocumentationController::class,'index']);

Route::get('/', [ApiDocumentationController::class, 'index'])->name('api.docs');