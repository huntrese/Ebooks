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


    public $fillable =["user_ID","book_ID"];    
    public $timestamps = false;

    public function user(): BelongsToMany
    {
        return $this->belongsToMany(Users::class,"user_ID","user_ID");
    }
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Books::class,"book_ID","book_ID");
    }
}
