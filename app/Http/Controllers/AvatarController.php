<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Account;

class AvatarController extends Controller
{
    public function profile()
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();
        $account = Account::find($user->user_ID);
        // You can also use the auth() helper function:
        // $user = auth()->user();

        return view('userprofile', compact('account'));
    }
}
