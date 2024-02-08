<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Users;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Library extends Model
{
    use HasFactory;

    protected $table = "library";


    public $fillable =["user_id","book_id"];    
    public $timestamps = false;

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(Users::class,"user_id","user_id");
    }
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Books::class,"book_id","book_id");
    }
}
