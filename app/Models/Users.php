<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'user_ID';
    protected $fillable = ['name', 'email', 'password'];
    public $timestamps = false;

    public function library(): HasMany
    {
        return $this->hasMany(Library::class,"user_ID","user_ID");
    }
    public function booksInLibrary()
    {
        return $this->belongsToMany(Books::class, 'library', 'user_ID', 'book_ID');
    }
    public function recent(): HasMany
    {
        return $this->hasMany(Recent::class,"user_ID","user_ID");
    }
}

