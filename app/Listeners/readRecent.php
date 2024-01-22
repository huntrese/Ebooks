<?php

namespace App\Listeners;

use App\Models\Recent;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Queue\ShouldQueue;

class readRecent
{

    /**
     * Handle the event.
     */
    public function handle(object $event)
    {
        
        $book_id = $event->book_id;
        $chapter_no = $event->chapter_no;
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
    }
}
