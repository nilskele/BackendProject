<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $newsletters = Newsletter::with(['comments' => function ($query) {
            $query->latest()->take(3);  
        }])->get();
    

        $showFullText = [];
        foreach ($newsletters as $index => $newsletter) {
            $showFullText[$index] = $request->has('show_more') && $request->input('show_more') == $index;
        }

        if ($request->has('show_less')) {
            $showFullText = array_fill(0, count($newsletters), false); 
        }

        return view('welcome', compact('newsletters', 'showFullText'))->with('user', Auth::user());
    }

    public function show(Newsletter $newsletter)
    {
        return view('newsletters.show', compact('newsletter'));
    }

    public function create()
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        return view('newsletters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $newsletter = new Newsletter();
        $newsletter->title = $request->input('title');
        $newsletter->content = $request->input('content');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('newsletters', 'public'); 
            $newsletter->image = $path; 
        }

        $newsletter->save();

        return redirect()->route('welcome')->with('success', 'Newsletter added successfully!');
    }

    public function edit($id)
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $newsletter = Newsletter::findOrFail($id);
        return view('newsletters.edit', compact('newsletter'));
    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        $newsletter = Newsletter::findOrFail($id);
        $newsletter->title = $request->input('title');
        $newsletter->content = $request->input('content');

        if ($request->hasFile('image')) {
            if ($newsletter->image && Storage::exists('public/' . $newsletter->image)) {
                Storage::delete('public/' . $newsletter->image);
            }

            $path = $request->file('image')->store('newsletters', 'public');
            $newsletter->image = $path;
        }

        $newsletter->save();

        return redirect()->route('welcome')->with('success', 'Newsletter updated successfully!');
    }

    public function destroy($id)
{
    $user = Auth::user();
    if (!$user || !$user->is_admin) {
        abort(403, 'Unauthorized action.');
    }

    $newsletter = Newsletter::findOrFail($id);

    $newsletter->comments()->delete();

    if ($newsletter->image && Storage::exists('public/' . $newsletter->image)) {
        Storage::delete('public/' . $newsletter->image);
    }

    $newsletter->delete();

    return redirect()->route('welcome')->with('success', 'Newsletter deleted successfully!');
}
}
