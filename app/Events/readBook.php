<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class readBook
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public $book_id;
    public $chapter_no;
    public function __construct(int $book_id,int $chapter_no)
    {
       $this->book_id = $book_id;
       $this->chapter_no = $chapter_no;
    }
}
