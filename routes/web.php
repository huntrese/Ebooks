<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\RecentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [BookController::class, 'index'])->name('home');

Route::get('/books/{book_id}', [BookController::class, 'show']);
Route::post('/books/{book_id}', [ChapterController::class, 'read'])->name('read.book');

Route::get('/author/{author_id}', [AuthorController::class, 'show']);

Route::get('/books/{book_id}/{chapter_no}', [ChapterController::class, 'find'])->name('read.book.chapters');

Route::middleware(['auth'])->group(function () {
    Route::get('/library', [LibraryController::class, 'library']);
    Route::post('/add-to-library/{book_ID}', [LibraryController::class, 'addToLibrary'])->name('add.to.library');

    Route::get('/recent', [RecentController::class, 'recent']);

    Route::get('/user', [AvatarController::class, 'profile']);

    Route::post('/update-profile',[AvatarController::class,'update'])->name('update');
});

Route::any('/search', [SearchController::class, 'search']);


Auth::routes();

Route::view('/please_login', 'please_login')->name('please_login');

