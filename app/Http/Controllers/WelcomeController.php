<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        // Sample data for newsletters
        $newsletters = [
            [
                'title' => 'Stay Updated',
                'content' => 'Subscribe to our newsletter and be the first to know about our latest updates. This is a long content that should be truncated. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus non lorem ut dui varius congue.',
                'image' => 'https://via.placeholder.com/300'
            ],
            [
                'title' => 'Get the Latest Updates',
                'content' => 'Sign up for our newsletter to receive the latest news, updates, and promotions. Short content here.',
                'image' => 'https://via.placeholder.com/300'
            ]
        ];

        // Handle 'show_more' and 'show_less' query to toggle content visibility
        $showFullText = [];
        foreach ($newsletters as $index => $newsletter) {
            $showFullText[$index] = $request->has('show_more') && $request->input('show_more') == $index;
        }

        // Handle 'show_less' query to hide the full text (if it's set)
        if ($request->has('show_less')) {
            $showFullText = array_fill(0, count($newsletters), false); // Reset all to false (truncate text)
        }

        return view('welcome', compact('newsletters', 'showFullText'));
    }
}
