<?php

use App\Http\Controllers\AgeLimitController;
use App\Http\Controllers\AnnotationController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BindingController;
use App\Http\Controllers\BookLanguageController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublishingHouseController;
use App\Http\Controllers\PublishingYearController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TranslatorController;
use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NameBookController;

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
    Route::resource('age_limits', AgeLimitController::class);
    Route::resource('annotations', AnnotationController::class);
    Route::resource('bindings', BindingController::class);
    Route::resource('book_languages', BookLanguageController::class);
    Route::resource('genres', GenreController::class);
    Route::resource('publishing_houses', PublishingHouseController::class);
    Route::resource('publishing_years', PublishingYearController::class);
    Route::resource('tags', TagController::class);
    Route::resource('types', TypeController::class);

    Route::resource('posts', PostController::class);
    Route::resource('books', BookController::class);
    Route::resource('authors', AuthorController::class);
    Route::resource('translators', TranslatorController::class);

    Route::resource('profile', ProfileController::class);

    Route::group(['prefix' => '/books/{book}/'], function () {
        Route::put('/read_category', [BookController::class, 'read_category'])->name('books.read_category');
    });
    
    Route::get('/read_books', [BookController::class, 'read_books'])->name('read_books');
    Route::get('/abandoned_books', [BookController::class, 'abandoned_books'])->name('abandoned_books');
    Route::get('/now_read_books', [BookController::class, 'now_read_books'])->name('now_read_books');
    Route::get('/want_read_books', [BookController::class, 'want_read_books'])->name('want_read_books');

    Route::group(['prefix' => '/posts/{post}/'], function () {
    Route::put('/update_status', [PostController::class, 'update_status'])->name('posts.update_status');
});
});

require __DIR__.'/auth.php';