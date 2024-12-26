<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Display the dashboard
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();
        
        // Return the view and pass the user data
        return view('dashboard', compact('user'));
    }
}

