<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Constructor to ensure only admins can access the dashboard
    

    // Show the Admin Dashboard
    public function index()
    {
        
        return view('admin-dashboard');
    }
}

