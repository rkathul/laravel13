<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\BlogController;

Route::post('/login', [LoginController::class, 'login']);

Route::get('/blogs', [BlogController::class, 'listBlogs']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
