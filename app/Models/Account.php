<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = "account";
    protected $primaryKey = 'account_ID';

    protected $nickname = "nickname";
    protected $avatar = "avatar";
    protected $description = "description";
    public $timestamps = false;

    use HasFactory;
}
