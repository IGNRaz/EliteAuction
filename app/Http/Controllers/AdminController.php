<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Admin Dashboard view
    public function index()
    {
        return view('admin.dashboard');
    }

    public function manageUsers()
    {
       
        return view('admin.users'); 
    }

  
}
