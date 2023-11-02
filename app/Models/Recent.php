<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recent extends Model
{
    protected $table = "recent";
    protected $primaryKey = 'book_id'; // Set the primary key to match your table's primary key

    protected $fillable = ['book_id', 'user_id', 'created_at','updated_at','chapter'];

    use HasFactory;
}
