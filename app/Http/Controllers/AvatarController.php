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
    // app/Http/Controllers/AccountController.php


// ...

public function updateAvatar(Request $request)
{
    // Validate and save the new profile picture (avatar)
    $request->validate([
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rules
    ]);
    $user = Auth::user();

    Account::find($user->user_ID)->avatar = $request->avatar;
    
    Account::find($user->user_ID)->save();

    return response()->json(['message' => 'Avatar updated successfully']);
}

public function updateDescription(Request $request)
{
    // Validate and save the new description
    $request->validate([
        'description' => 'required|string|max:255', // Example validation rules
    ]);

    $user = Auth::user();
    Account::find($user->user_ID)->description = $request->description;
    
    Account::find($user->user_ID)->save();
    return response()->json(['message' => 'Description updated successfully']);
}

}
