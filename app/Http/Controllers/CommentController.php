<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, Newsletter $newsletter)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to comment.');
        }

        $request->validate([
            'content' => 'required|string|min:5|max:500',
        ]);

        Comment::create([
            'content' => $request->input('content'),
            'user_id' => Auth::id(),
            'newsletter_id' => $newsletter->id,
        ]);

        return redirect()->route('newsletters.show', $newsletter)->with('success', 'Your comment has been posted.');
    }
}
