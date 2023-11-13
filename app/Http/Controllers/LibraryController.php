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
        
        $bookID = $request->input('book_ID');
        $user = Auth::user();
        // Check if the book is already in the user's library
        $existingRecord = $user->library;
        if (!$existingRecord) {
            // Add the book to the user's library
            Library::create([
                'user_ID' => $user->userID,
                'book_ID' => $bookID,
            ]);
        } 

        return redirect()->back();
       
    }
}
