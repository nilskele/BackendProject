<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class QAController extends Controller
{
    // Display the Q&A page for users
    public function index()
    {
        $categories = Category::all();
        $questions = Question::whereNotNull('answer')->with('category')->get();

        return view('qa.user', compact('categories', 'questions'));
    }

    // Handle user-submitted questions
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Question::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'category_id' => $request->category_id,
            'question' => $request->question,
        ]);

        return redirect()->back()->with('success', 'Question submitted successfully.');
    }

    public function showAdmin()
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        // Fetch unanswered questions (questions where 'is_answered' is false)
        $unansweredQuestions = Question::where('is_answered', false)->with('category')->get();

        // Fetch categories for the category management section
        $categories = Category::all();

        // Pass both unanswered questions and categories to the view
        return view('qa.admin', compact('unansweredQuestions', 'categories'));
    }

    // Respond to a question
    public function respond(Request $request, Question $question)
    {
        $request->validate([
            'answer' => 'required|string|min:10', // Admin's answer content
        ]);

        $question->update([
            'answer' => $request->answer,
            'is_answered' => true,
        ]);

        return redirect()->route('qa.admin')->with('success', 'Response sent successfully!');
    }

    public function destroy(Question $question)
    {
        // Ensure the question exists and is not already answered
        if ($question) {
            $question->delete(); // Delete the question from the database
            return redirect()->route('qa.admin')->with('success', 'Question deleted successfully.');
        }

        return redirect()->route('qa.admin')->with('error', 'Question not found.');
    }

    public function updateAnswer(Request $request, Question $question)
    {
        // Ensure only admins can update the answer
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        // Validate the new answer
        $validated = $request->validate([
            'answer' => 'required|string|max:1000',
        ]);

        // Update the answer
        $question->answer = $validated['answer'];
        $question->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Answer updated successfully!');
    }
    // Admin update question
    public function updateQuestion(Request $request, Question $question)
    {
        // Ensure only admins can update the question
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        // Validate the new question
        $validated = $request->validate([
            'question' => 'required|string|max:1000',
        ]);

        // Update the question text
        $question->question = $validated['question'];
        $question->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Question updated successfully!');
    }
}


