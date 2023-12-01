<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Authors;

class AuthorController extends Controller
{
    public function show($author_id)
    {
        $author = Authors::findOrFail($author_id);    
        $books =$author->books;
    
        return view('author', compact('author', 'books'));
    }
}
