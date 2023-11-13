<?php

namespace App\Http\Controllers;

use App\Models\Authors;
use App\Models\Books;
use Illuminate\Http\Request;
use App\User;
use PharIo\Manifest\Author;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->input('q');


        $book = Books::where('name', 'LIKE', '%' . $q . '%')->get();
        $author = Authors::where('name', 'LIKE', '%' . $q . '%')->get();
        
        if (count($book)+count($author) > 0) {
            return view('search')->with(['books' => $book,'authors' => $author, 'query' => $q]);
        } else {
            return view('search')->with(['message' => 'No Details found. Try to search again!']);
        }
    
                    
    }
}
