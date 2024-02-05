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
    $user = Auth::user();

    $recentBooks = $user->recent()
        ->orderBy('recent.updated_at', 'desc')
        ->join('books', 'books.book_id', '=', 'recent.book_id')
        ->get();
    return view('recent', compact('recentBooks'));
}

}
