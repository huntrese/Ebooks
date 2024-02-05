<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Authors;
use App\Models\Chapters;

use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class LibraryController extends Controller
{
    public function library()
{
    $user = Auth::user();
    // Get all book objects for the user
    $books = $user->booksInLibrary;
    return view('library', compact('books'));

    
}
public function addToLibrary(Request $request)
    {
        
        $book_id = $request->input('book_id');

        $user = Auth::user();
        // Check if the book is already in the user's library
        $library = $user->library;
        $bookIDs = $library->pluck('book_id')->toArray();
        $isInLibrary = in_array($book_id, $bookIDs);   
        if (!$isInLibrary) {
            // Add the book to the user's library
            Library::create([
                'user_id' => $user->user_id,
                'book_id' => $book_id,
            ]);
        } 

        return redirect()->back();
       
    }
}
