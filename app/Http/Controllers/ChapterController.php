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
    $book = Books::find($book_id);

    if (!$book) {
        return response()->json(['error' => 'Book not found'], 404);
    }

    $user_id = Auth::user()->user_ID;

    $recent = Recent::where('book_id', $book_id)
        ->where('user_id', $user_id)
        ->first();

    if ($recent === null) {
        // The book is not in the recent list, so create a new entry with the chapter.
        Recent::create([
            'book_id' => $book_id,
            'user_id' => $user_id,
            'chapter' => $chapter_no,
        ]);
    } else {
        // The book is already in the recent list.
        if ($recent->chapter != $chapter_no) {
            // Use the update method to update the chapter.
            Recent::where('user_ID', $user_id)
                ->where('book_id', $book_id) // Add this condition to restrict the update to the specific book
                ->update(['chapter' => $chapter_no]);
        }
    }

    

    
    
    
    
    
        $chapters=Chapters::where('book_ID', $book_id)->get();
    // Find the chapter for the specified book based on order
    $chapter = $chapters
        ->skip($chapter_no - 1) // -1 because array indexes start at 0
        ->take(1)
        ->first();
        $indexes = range(0, count($chapters) - 1);
        $prev=-1;
    $next=-1;
    if (!$chapter) {
        return response()->json(['error' => 'Chapter not found'], 404);
    } else {
        if ($chapter_no!=1){
        $prev=$chapter_no-1;}
        if ($chapters->count()>$chapter_no){
        // echo(count($chapters));
        $next=$chapter_no+1;}
    }

    return view("chapter",compact('chapters','chapter',"prev","next","indexes"));
}


}

