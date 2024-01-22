<?php
namespace App\Http\Controllers;

use App\Events\readBook;
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
        $book = Books::findOrFail($book_id);
        $chapters = $book->chapters;
        $indexes = range(0, count($chapters) - 1);
        $chapter=$chapters->first();
        $prev=0;
        $next=2;

        if(!Auth::check()){
            return view("chapter", compact('chapters', 'chapter', 'prev', 'next', 'indexes'));
        }

        readBook::dispatch($book_id,$chapter_no);
        
    

    
        $chapter = $chapters
            ->skip(Auth::user()->user_ID ? $chapter_no - 1 : 0)
            ->take(1)
            ->firstOrFail();
    

    
        // Calculate previous and next chapter numbers
        $prev = ($chapter_no != 1) ? $chapter_no - 1 : -1;
        $next = ($chapters->count() > $chapter_no) ? $chapter_no + 1 : -1;
    
    
        return view("chapter", compact('chapters', 'chapter', 'prev', 'next', 'indexes'));
    }
    
public function read($book_id, $chapter = 1)
{
    if (Auth::check()) 
        $user = Auth::user();
        $recentBook = $user->recent()->where('book_ID', $book_id)->first();
        // Check if a recent book entry exists
        $isInRecent = $recentBook !== null;
        // Retrieve the chapter from the recent book entry
        $chapter = $isInRecent ? $recentBook->chapter : 1;    
    
        if (!$isInRecent){
            Recent::create([
                'user_id' => $user->user_ID,
                'book_id' => $book_id,
                'chapter_id' => 1
            ]);
        }
    
    

    
    // Logic to determine the URL for reading
    return to_route("read.book.chapters",["book_id"=>$book_id,"chapter_no"=>$chapter]);
    
}


}

