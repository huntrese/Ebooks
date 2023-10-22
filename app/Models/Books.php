<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'book_ID';
    protected $fillable = ['name', 'author_ID', 'description', 'image_path'];

    use HasFactory;

    // Define the relationship to Author
    public function author()
    {
        return $this->belongsTo(Authors::class, 'author_ID', 'author_ID');
    }

    // Define the one-to-many relationship to Chapters
    public function chapters()
    {
        return $this->hasMany(Chapters::class, 'book_ID', 'book_ID');
    }
}
