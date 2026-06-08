<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return redirect('/posts');
});

Route::resource('posts', PostController::class);
Route::resource('categories', CategoryController::class);
Route::post('/posts/{post}/comments', [CommentController::class, 'store']);
Route::delete('/comments/{comment}', [CommentController::class, 'destroy']);
