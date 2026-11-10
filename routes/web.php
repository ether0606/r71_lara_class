<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/category', function () {
    return view('category');
});
    Route::resource('products', ProductController::class)->middleware('auth');
Route::middleware('auth')->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('tasks', [TaskController::class, 'index']);
        Route::get('/tasks/{k}', [TaskController::class, 'show']);
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
