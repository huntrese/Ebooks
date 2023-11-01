<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\SearchController;
use \Illuminate\Support\Facades\Auth;

Route::get('/', [BookController::class, 'index']);
Route::get('/books/{book_id}', [BookController::class, 'show']);
Route::get('/books/{book_id}/{chapter_no}', [ChapterController::class, 'find']);
Route::get('/library', [LibraryController::class, 'library']);
Route::get('/recent', function () {
    return view('recent');
});
Route::get('/user', [AvatarController::class, 'profile']);
Route::any('/search', [SearchController::class, 'search']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
