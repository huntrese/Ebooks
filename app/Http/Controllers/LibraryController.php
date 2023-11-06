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

    $user = Auth::user();
    if(Auth::check()){
        $userBookIDs = Library::where('user_ID', Auth::user()->user_ID)->pluck('book_ID')->toArray();

        // Count the number of book IDs
        $count = count($userBookIDs);

        // Get all book objects for the user
        $books = Books::whereIn('book_ID', $userBookIDs)->get();

        // Output the count


        return view('library', compact('books'));

    } else{
        return view('please_login');
    }
}
}
