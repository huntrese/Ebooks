<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Authors;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Books extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'book_id';
    protected $fillable = ['name', 'author_id', 'description', 'image_path'];


    // Define the relationship to Author
    public function author(): BelongsTo
    {
        return $this->belongsTo(Authors::class, 'author_id');
    }

    // Define the one-to-many relationship to Chapters
    public function chapters(): HasMany
    {
        return $this->hasMany(Chapters::class, 'book_id');
    }

}