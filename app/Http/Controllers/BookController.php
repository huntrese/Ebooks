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
        $book = Books::find($book_id);
    
        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }
    
        $author = $book->author;
    
        // Retrieve the chapters and sort them numerically
        $chapters = $book->chapters;

        // Check if the book is in the user's library
        $user = Auth::user();
        $library = $user->library;
        $isInLibrary = $library->contains($book);

        return view('book', compact('book', 'author', 'chapters', 'isInLibrary'));
    }
}
