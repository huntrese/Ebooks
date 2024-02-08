<?php
namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Authors;
use App\Models\Chapters;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index()
    {
        $books = Books::all();
        return view('homepage', compact('books'));
    }

    public function show($book_id)
    {
        $book = Books::findOrFail($book_id);
    

    
        $author = $book->author;
    
        // Retrieve the chapters and sort them numerically
        $chapters = $book->chapters;

        // Check if the book is in the user's library
        $user = Auth::user();
        if ($user){
            $library = $user->library;
            $bookIDs = $library->pluck('book_id')->toArray();
            $isInLibrary = in_array($book_id, $bookIDs);   
        } else {
            $isInLibrary = false;
        }
        return view('book', compact('book', 'author', 'chapters', 'isInLibrary'));
    }
}
