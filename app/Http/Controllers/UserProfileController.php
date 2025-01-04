<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        return view('user-profiles', compact('users')); 
    }

    public function dashboard($id)
    {
        $user = User::findOrFail($id); 
        $posts = $user->posts; 
        $isOwner = Auth::check() && Auth::id() === $user->id;        
        return view('dashboard', compact('user', 'posts','isOwner')); 
    }
}
