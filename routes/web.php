<?php

use App\Http\Controllers\NameBookController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
})->name('index');

Route::get('/register', function () {
    return view('pages.register');
});

Route::get('/cabinet', function () {
    return view('pages.about-reader');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::resource('name_books', NameBookController::class);
Route::resource('posts', PostController::class);

Route::group(['prefix' => '/posts/{post}/'], function () {
    Route::put('/update_status', [PostController::class, 'update_status'])->name('posts.update_status');
});