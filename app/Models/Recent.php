<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Users;

class Recent extends Model
{
    use HasFactory;

    protected $table = "recent";
    protected $primaryKey = 'book_id'; // Set the primary key to match your table's primary key

    protected $fillable = ['book_id', 'user_id', 'created_at','updated_at','chapter'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Users::class,"user_ID");
    }
}
