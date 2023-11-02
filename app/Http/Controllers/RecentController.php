<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\Recent;
use Illuminate\Support\Facades\Auth;

class RecentController extends Controller
{
    public function recent()
    {
        // Get all recent books for the user and sort them by 'updated_at' in descending order
        $recentBooks = Recent::where('user_id', Auth::user()->user_ID)->orderBy('updated_at', 'desc')->get();
    
        // Create an array to store chapter numbers for recent books
        $chapterNumbers = [];
    
        // Create an array to store book objects for recent books
        $books = [];
    
        foreach ($recentBooks as $recentBook) {
            $chapterNumbers[$recentBook->book_ID] = $recentBook->chapter;
    
            // Fetch the book object for this recent book
            $book = Books::where('book_id', $recentBook->book_ID)->first();
    
            // Check if the book object is not null
            if ($book) {
                $books[] = $book; // Store the book object in the array
            }
        }
    
        // Output the count of recent books and chapter numbers
        $recentCount = count($recentBooks);
        $chapterNumbersCount = count($chapterNumbers);
    
        // Now, $books contains book objects for recent books sorted by 'updated_at' in descending order
    
        return view('recent', compact('books', 'chapterNumbers'));
    }
}
