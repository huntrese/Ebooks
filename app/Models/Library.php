<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Library extends Model
{
    protected $table = "library";

    protected $user_ID = "user_ID";
    protected $book_ID = "book_ID";
    public $timestamps = false;

    use HasFactory;
}
