<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;

    protected $table = 'author';
    protected $primaryKey = 'author_id';
    protected $fillable = ['name'];
    

    // Define the inverse (one-to-many) relationship to Books
    public function books()
    {
        return $this->hasMany(Books::class, 'author_id');
    }
}
