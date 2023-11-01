<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SearchController;

Route::get('/', [BookController::class, 'index']);
Route::get('/books/{book_id}', [BookController::class, 'show']);
Route::get('/books/{book_id}/{chapter_no}', [ChapterController::class, 'find']);
Route::get('/library', [BookController::class, 'library']);
Route::get('/recent', function () {
    return view('recent');
});
Route::get('/user', [UserController::class, 'profile']);
Route::any('/search', [SearchController::class, 'search']);

?>