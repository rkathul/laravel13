<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\CommentController;

Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [LoginController::class, 'register']);

Route::get('/blogs', [BlogController::class, 'listBlogs']);
Route::get('/blog/{slug}', [BlogController::class, 'showBlog']);

Route::middleware('auth:sanctum')->group(function () {

    // Blog routes
    Route::post('/blog', [BlogController::class, 'createBlog']);
    Route::post('/blog/{id}', [BlogController::class, 'updateBlog']);
    Route::delete('/blog/{id}', [BlogController::class, 'deleteBlog']);


    // Comment routes
    Route::post('/comment', [CommentController::class, 'createComment']);
    Route::post('/comment/{id}', [CommentController::class, 'updateComment']);
    Route::delete('/comment/{id}', [CommentController::class, 'deleteComment']);

    Route::post('/logout', [LoginController::class, 'logout']);
});
