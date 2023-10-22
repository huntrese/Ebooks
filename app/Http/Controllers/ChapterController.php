<?php
namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Chapters;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function find($book_id, $chapter_no)
{
    // Find the book based on its ID
    $book = Books::find($book_id);

    if (!$book) {
        return response()->json(['error' => 'Book not found'], 404);
    }

    // Find the chapter for the specified book and position and sort by position
    $chapter = Chapters::where('book_ID', $book_id)
        ->where('position', $chapter_no)
        ->orderBy('position')
        ->first();

    if (!$chapter) {
        return response()->json(['error' => 'Chapter not found'], 404);
    }

    return $chapter;
}

}

