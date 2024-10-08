<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\NameBookController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about', function () {
    return view('pages.about');
});


Route::middleware('auth')->group(function () {
    Route::resource('name_books', NameBookController::class);
    Route::resource('posts', PostController::class);
    Route::resource('books', BookController::class);

    Route::group(['prefix' => '/posts/{post}/'], function () {
    Route::put('/update_status', [PostController::class, 'update_status'])->name('posts.update_status');
});
});

require __DIR__.'/auth.php';