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
        $description = $request->query('description');
        $account =  Auth::user();;
        $data = $request->all();
        $account->name = $data['name'];
        $account->email = $data['email'];
        $account->avatar = $data['avatar'];
        $account->description = $data['description'];
        $account->save();


        return view('userprofile', compact('account'));

       
    }
    // app/Http/Controllers/AccountController.php
}
