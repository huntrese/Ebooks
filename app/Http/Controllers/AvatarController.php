<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Recent;

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
        
    
        
        // Check if a file was uploaded
        if ($request->hasFile('avatar')) {
            
            $avatar = $request->file('avatar');
            
            $fileName =  $avatar->getClientOriginalName();
            
            // Store the file in the 'avatars' directory within the storage folder
            $file = $request->file('avatar');
            $file->storeAs('public/avatars', $fileName);
            $filePath="storage/avatars/".$fileName;
            // Set the avatar field in the database to the file path
            $account->avatar = $filePath;
        }
        if ($request->has("description")){
            $account->description = strip_tags($request->get('description'));
        }
        if($request->has("clearRecent")){
            $user = Auth::user();
            
            Recent::where('user_id', $user->id)->delete();
            return back()->with("success","successfully removed recents");
        }
        $account->save();
        return back();
    }
}
