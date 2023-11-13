<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Authors;

class AuthorController extends Controller
{
    public function show($author_id)
    {
        $author = Authors::find($author_id);
    
        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }
    
        $books =$author->books;
    
        return view('Author', compact('author', 'books'));
    }
}
