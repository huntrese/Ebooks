<?php
namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Chapters;
use Illuminate\Http\Request;
use PHPUnit\Event\Telemetry\System;

class ChapterController extends Controller
{
    public function find(int $book_id, $chapter_no)
{
    // Find the book based on its ID
    $book = Books::find($book_id);

    if (!$book) {
        return response()->json(['error' => 'Book not found'], 404);
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

