<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', ProductController::class);

Route::prefix('admin')->group(function () {
    Route::get('tasks', [TaskController::class, 'index']);
    Route::get('/tasks/{k}', [TaskController::class, 'show']);
});

