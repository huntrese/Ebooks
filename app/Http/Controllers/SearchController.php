<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $q = $request->input('q');


        $book = Books::where('name', 'LIKE', '%' . $q . '%')
                    ->get();
        
        if (count($book) > 0) {
            return view('search')->with(['details' => $book, 'query' => $q]);
        } else {
            return view('search')->with(['message' => 'No Details found. Try to search again!']);
        }
    
                    
    }
}
