<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapters extends Model
{
    use HasFactory;

    protected $table = 'chapters';
    protected $primaryKey = 'chapter_ID';
    protected $fillable = ['book_ID', 'chapter_name', 'chapter'];


    // Define the relationship to Book
    public function book()
    {
        return $this->belongsTo(Books::class, 'book_ID');
    }
}
