<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banned;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    // Admin Dashboard view
    public function index()
    {
        return view('admin.dashboard');
    }

    public function manageUsers()
    {
        $users = User::all();
        return view('admin.control.user', compact('users')); 
    }

    public function ban(User $user){
        return view('admin.control.banned', compact('user'));
    }

   
    public function banUser(Request $request, User $user)
    {
        Banned::create([
            'banned_email' => $user->email,
            'banned' => true,
            'reason' => $request->input('reason', 'No reason provided'),
            'expires_at' => $request->input('expires_at', null),
            'banned_by' => Auth::user()->id
        ]);
    
        return redirect()->back();
    }
    
    public function unbanUser(User $user)
    {
        Banned::where('user_id', $user->id)->delete();
        return redirect()->back();
    }

}
