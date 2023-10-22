<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_ID';
    public $timestamps = false;

    use HasFactory;

    // Define a relationship for the library (if needed)
    public function library()
    {
        return $this->belongsToMany(Book::class, 'library', 'user_ID', 'book_ID');
    }
}
