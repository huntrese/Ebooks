<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Authors;
use App\Models\Chapters;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LibraryController extends Controller
{
    public function library()
{
    // Get all book_IDs for the user
    $userBookIDs = Library::where('user_ID', Auth::user()->id)->pluck('book_ID')->all();

    // Get all book objects for the user
    $books = Books::whereIn('book_ID', $userBookIDs)->get();

    return view('library', compact('books'));
}
}
