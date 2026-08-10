<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\BlogController;

Route::post('/login', [LoginController::class, 'login']);

Route::get('/blogs', [BlogController::class, 'listBlogs']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/blog', [BlogController::class, 'createBlog']);
    Route::post('/blog/{id}', [BlogController::class, 'updateBlog']);
     Route::delete('/blog/{id}', [BlogController::class, 'deleteBlog']);
});
