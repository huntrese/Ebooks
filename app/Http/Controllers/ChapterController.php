<?php
namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Chapters;
use App\Models\Recent;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use PHPUnit\Event\Telemetry\System;

class ChapterController extends Controller
{
    public function find(int $book_id, $chapter_no)
    {
        $user = Auth::user();
        $user_id = optional($user)->user_ID;
    
        // Update recent entry if user is logged in
        if ($user_id) {
            $recent = $user->recent()->where("user_id", $user_id)->first();
    
            if ($recent === null) {
                Recent::create([
                    'book_id' => $book_id,
                    'user_id' => $user_id,
                    'chapter' => $chapter_no,
                ]);
            } elseif ($recent->chapter != $chapter_no) {
                Recent::where('user_id', $user_id)
                    ->where('book_id', $book_id)
                    ->update(['chapter' => $chapter_no]);
            }
        }
    
        $book = Books::find($book_id);
    
        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }
    
        $chapters = $book->chapters;
    
        $chapter = $chapters
            ->skip($user_id ? $chapter_no - 1 : 0)
            ->take(1)
            ->first();
    
        if (!$chapter) {
            return response()->json(['error' => 'Chapter not found'], 404);
        }
    
        // Calculate previous and next chapter numbers
        $prev = ($chapter_no != 1) ? $chapter_no - 1 : -1;
        $next = ($chapters->count() > $chapter_no) ? $chapter_no + 1 : -1;
    
        $indexes = range(0, count($chapters) - 1);
    
        return view("chapter", compact('chapters', 'chapter', 'prev', 'next', 'indexes'));
    }
    
public function read($book_id, $chapter = 1)
{
    if (!Auth::check()) {
        $isInRecent = false;
    } else {
        $user = Auth::user();
        $recentBook = $user->recent()->where('book_ID', $book_id)->first();
        // Check if a recent book entry exists
        $isInRecent = $recentBook !== null;
        // Retrieve the chapter from the recent book entry
        $chapter = $isInRecent ? $recentBook->chapter : 1;    
    }
    

    
    // Logic to determine the URL for reading
    $url = "books/$book_id/$chapter";
    return redirect($url);
    
}


}

