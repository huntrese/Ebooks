<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Authors;
use App\Models\Chapters;

use Illuminate\Http\Request;

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
    
        $author = Authors::find($book->author_ID);
    
        // Retrieve the chapters and sort them numerically
        $chapters = Chapters::where('book_ID', $book_id)
            ->get();
    
        return view('book', compact('book', 'author', 'chapters'));
    }
    
    
    
    public function library()
    {
        $books = Books::all();
        return view('library', compact('books'));
    }
}
