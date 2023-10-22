<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    protected $table = 'chapters';
    protected $primaryKey = 'chapter_ID';
    protected $fillable = ['book_ID', 'chapter_name', 'chapter'];

    use HasFactory;

    // Define the relationship to Book
    public function book()
    {
        return $this->belongsTo(Books::class, 'book_ID', 'book_ID');
    }
}
