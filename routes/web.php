<?php

use Illuminate\Support\Facades\Route;
use App\Models\Books;
use App\Models\Users;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Users::all();
});

Route::get('/books', function () {
    return view('homepage',["books"=>Books::all()]);
});


Route::get('/book/{book_id}', function ($book_id) {
    return Books::find($book_id);
});

Route::get('/books/{book_id}', function ($book_id) {
    return view("home",['book'=>Books::find($book_id)]);
});

Route::get('/library', function () {
    return view('library',["books"=>Books::all()]);
});
Route::get('/recent', function () {
    return view('recent');
});

Route::get('/user', function () {
    return view('userprofile');
});
