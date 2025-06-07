<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\ReviewController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors', 'get');
    Route::get('/authors/{id}', 'details');
    Route::post('/authors', 'store');
    Route::patch('/authors/{id}', 'update');
    Route::delete('/authors/{id}', 'delete');

    Route::get('/author/books', 'getWithBooks');
    Route::get('/author/books/{id}', 'findBooks');
});

Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'get');
    Route::get('/books/{id}', 'details');
    Route::post('/books', 'store');
    Route::patch('/books/{id}', 'update');
    Route::delete('/books/{id}', 'delete');
   
    Route::get('/book/reviews/{id}', 'findReviews');
    Route::get('/book/reviews', 'getWithReviews');
    Route::get('/books/author', 'getWithAuthor');
    
    //Route::get('/books/author/{id}', 'findAuthor');
});

Route::controller(ClientController::class)->group(function () {
    Route::get('/clients', 'get');
    Route::get('/clients/{id}', 'details');
    Route::post('/clients', 'store');
    Route::patch('/clients/{id}', 'update');
    Route::delete('/clients/{id}', 'delete');

    Route::get('/client/reviews/{id}', 'findReviews');

    //Route::get('/clients/reviews', 'getWithReviews');
});

Route::controller(GenderController::class)->group(function () {
    Route::get('/genders', 'get');
    Route::get('/genders/{id}', 'details');
    Route::post('/genders', 'store');
    Route::patch('/genders/{id}', 'update');
    Route::delete('/genders/{id}', 'delete');

    Route::get('/gender/books/{id}', 'findBooks');
    Route::get('/gender/books', 'getWithBooks');
});

Route::controller(ReviewController::class)->group(function () {
    Route::get('/reviews', 'get');
    Route::get('/reviews/{id}', 'details');
    Route::post('/reviews', 'store');
    Route::patch('/reviews/{id}', 'update');
    Route::delete('/reviews/{id}', 'delete');

    //Route::get('/reviews/book/{id}', 'findBook');
    //Route::get('/reviews/client/{id}', 'findClient');
    //Route::get('/reviews/book', 'getWithBook');
    //Route::get('/reviews/client', 'getWithClient');
});
