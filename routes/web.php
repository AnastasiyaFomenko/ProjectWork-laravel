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
use App\Http\Controllers\ReviewController;
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

Route::get('/user_profile/{user}', [ProfileController::class, 'user_profile'])->name('user.user_profile');

Route::get('/user_profile_read_books/{user}', [ProfileController::class, 'user_read_books'])->name('user.user_read_books');

Route::get('/user_profile_want_read_books/{user}', [ProfileController::class, 'user_want_read_books'])->name('user.user_want_read_books');

Route::get('/user_profile_abandoned_books/{user}', [ProfileController::class, 'user_abandoned_books'])->name('user.user_abandoned_books');

Route::get('/user_profile_now_read_books/{user}', [ProfileController::class, 'user_now_read_books'])->name('user.user_now_read_books');

Route::get('/user_profile_reviews/{user}', [ProfileController::class, 'user_review'])->name('user.user_reviews');
Route::get('/user_profile_posts/{user}', [ProfileController::class, 'user_posts'])->name('user.user_posts');

Route::resource('books', BookController::class);


Route::resource('posts', PostController::class);


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

    Route::resource('authors', AuthorController::class);
    Route::resource('translators', TranslatorController::class);
    Route::resource('reviews', ReviewController::class);


    Route::resource('profile', ProfileController::class);

    Route::group(['prefix' => '/books/{book}/'], function () {
        Route::put('/read_category', [BookController::class, 'read_category'])->name('books.read_category');
        Route::get('/add_author', [BookController::class, 'add_author'])->name('books.add_author');
        Route::post('/store_author', [BookController::class, 'store_author'])->name('books.store_author');
        Route::get('/add_genre', [BookController::class, 'add_genre'])->name('books.add_genre');
        Route::post('/store_genre', [BookController::class, 'store_genre'])->name('books.store_genre');
        Route::get('/add_tag', [BookController::class, 'add_tag'])->name('books.add_tag');
        Route::post('/store_tag', [BookController::class, 'store_tag'])->name('books.store_tag');
        Route::get('/add_translator', [BookController::class, 'add_translator'])->name('books.add_translator');
        Route::post('/store_translator', [BookController::class, 'store_translator'])->name('books.store_translator');
        Route::get('/add_review', [BookController::class, 'add_review'])->name('books.add_review');
        Route::post('/store_review', [BookController::class, 'store_review'])->name('books.store_review');
    });
    
    Route::get('/read_books', [BookController::class, 'read_books'])->name('read_books');
    Route::get('/abandoned_books', [BookController::class, 'abandoned_books'])->name('abandoned_books');
    Route::get('/now_read_books', [BookController::class, 'now_read_books'])->name('now_read_books');
    Route::get('/want_read_books', [BookController::class, 'want_read_books'])->name('want_read_books');
    Route::get('/user_reviews', [ReviewController::class, 'user_reviews'])->name('user_reviews');
    Route::get('/user_posts', [PostController::class, 'user_posts'])->name('user_posts');

    Route::group(['prefix' => '/posts/{post}/'], function () {
    Route::put('/update_status', [PostController::class, 'update_status'])->name('posts.update_status');
});
});

require __DIR__.'/auth.php';