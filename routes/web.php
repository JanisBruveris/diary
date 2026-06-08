<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\DiaryController;
use App\Http\Controllers\PostController;

Route::get('/why', function () {
    return view('why');
});
Route::get('/todos', [ToDoController::class, 'index']);
Route::get('/todos/create', [ToDoController::class, 'create']);
Route::post('/todos', [ToDoController::class, 'store']);
Route::get('/todos/{todo}/edit', [ToDoController::class, 'edit']);
Route::put('/todos/{todo}', [ToDoController::class, 'update']);
Route::delete('/todos/{todo}', [ToDoController::class, 'destroy']);
Route::get('/todos/{todo}', [ToDoController::class, 'show']);

Route::get('/diaries', [DiaryController::class, 'index']);
Route::get('/diaries/create', [DiaryController::class, 'create']);
Route::post('/diaries', [DiaryController::class, 'store']);
Route::get('/diaries/{diary}/edit', [DiaryController::class, 'edit']);
Route::put('/diaries/{diary}', [DiaryController::class, 'update']);
Route::delete('/diaries/{diary}', [DiaryController::class, 'destroy']);
Route::get('/diaries/{diary}', [DiaryController::class, 'show']);

Route::resource('posts', PostController::class);