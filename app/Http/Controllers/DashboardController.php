<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategory;  

class DashboardController extends Controller
{
    public function index()
{
    $user = Auth::user(); 

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please log in to access the dashboard.');
    }
    $isOwner = Auth::check() && Auth::id() === $user->id;


    $posts = Post::with('categories') 
                 ->where('user_id', $user->id)
                 ->orderBy('begin_date', 'asc')
                 ->get();

    $categories = PostCategory::all();


    return view('dashboard', compact('user', 'posts','isOwner','categories')); 
}
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'text' => 'required|string',
        'location' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'begin_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:begin_date',
        'categories' => 'required|array', 
        'categories.*' => 'exists:post_categories,id', 
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('posts', 'public');
    }

    $post = Post::create([
        'user_id' => Auth::id(),
        'title' => $request->title,
        'text' => $request->text,
        'location' => $request->location,
        'image' => $imagePath,
        'begin_date' => $request->begin_date,
        'end_date' => $request->end_date,
    ]);

    
    $post->categories()->sync($request->categories); 

    return redirect()->route('dashboard')->with('success', 'Post created successfully.');
}

public function destroy(Post $post)
{
    if (Auth::check() && Auth::id() !== $post->user_id) {
        return redirect()->route('dashboard')->with('error', 'Unauthorized action.');
    }

    $post->delete();

    return redirect()->route('dashboard')->with('success', 'Post deleted successfully.');
}




}

