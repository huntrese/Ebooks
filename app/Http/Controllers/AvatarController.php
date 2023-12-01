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
        
        $account = Auth::user();;
        return view('userprofile', compact('account'));

       
    }
    public function update(Request $request)
    {
        // Retrieve the currently authenticated user
        $account = Auth::user();
        
        $account->name = $request->input('name');
        $account->email = $request->input('email');
        $account->description = $request->input('description');
        
        // Check if a file was uploaded
        if ($request->hasFile('avatar')) {
            
            $avatar = $request->file('avatar');
            
            $fileName =  $avatar->getClientOriginalName();
            
            // Store the file in the 'avatars' directory within the storage folder
            $filePath = $request->file('avatar')->storeAs('avatars', $fileName);
            
            // Set the avatar field in the database to the file path
            $account->avatar = $filePath;
        }
    
        $account->save();
    
        return view('userprofile', compact('account'));
    }
}
