<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('demo');
});

Route::middleware('auth')
    ->get('/dashboard', fn () => view('dashboard'))
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('posts', PostController::class);
});
