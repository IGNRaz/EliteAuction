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
    // Check if the user is already banned
    if (Banned::where('banned_email', $user->email)->exists()) {
        return redirect()->back()->with('error', 'User is already banned.');
    }

    Banned::create([
        'banned_email' => $user->email,
        'banned' => true,
        'reason' => $request->input('reason', 'No reason provided'),
        'expires_at' => $request->input('expires_at', null),
        'banned_by' => Auth::id()
    ]);

    return redirect()->route('admin.users');
}

    
    public function unbanUser(User $user)
    {
        Banned::where('banned_email', $user->email)->delete();
        return redirect()->back();
    }

    public function logs(){
        return view('admin.control.logs');
    }

    public function auction(){
        return view('admin.control.auctions');
    }
}
