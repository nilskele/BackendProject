<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use App\Models\Newsletter;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    // Display the welcome page with newsletters
    public function index(Request $request)
    {
        // Retrieve newsletters from the database
        $newsletters = Newsletter::all();

        // Handle 'show_more' and 'show_less' query to toggle content visibility
        $showFullText = [];
        foreach ($newsletters as $index => $newsletter) {
            $showFullText[$index] = $request->has('show_more') && $request->input('show_more') == $index;
        }

        if ($request->has('show_less')) {
            $showFullText = array_fill(0, count($newsletters), false); // Reset all to false (truncate text)
        }
        foreach ($newsletters as $newsletter) {
            if ($newsletter->image) {
                $newsletter->image_url = 'data:image/jpeg;base64,' . base64_encode($newsletter->image);
            }
        }

        // Pass data to the view
        return view('welcome', compact('newsletters', 'showFullText'))->with('user', Auth::user());
    }

    // Show the form for creating a new newsletter (only for admins)
    public function create()
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        return view('newsletters.create');
    }

    // Store the newly created newsletter
    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Only allow images
        ]);

        // Store the newsletter in the database
        $newsletter = new Newsletter();
        $newsletter->title = $request->input('title');
        $newsletter->content = $request->input('content');

        // Store the image as a blob (optional: you could store the image in storage instead)
        $newsletter->image = file_get_contents($request->file('image')->getRealPath());

        $newsletter->save();

        return redirect()->route('welcome')->with('success', 'Newsletter added successfully!');
    }
}