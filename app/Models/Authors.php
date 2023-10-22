<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    protected $table = 'author';
    protected $primaryKey = 'author_ID';
    protected $fillable = ['name'];
    
    use HasFactory;

    // Define the inverse (one-to-many) relationship to Books
    public function books()
    {
        return $this->hasMany(Book::class, 'author_ID', 'author_ID');
    }
}
