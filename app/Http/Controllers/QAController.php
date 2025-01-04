<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class QAController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $questions = Question::whereNotNull('answer')->with('category')->get();

        return view('qa.user', compact('categories', 'questions'));
    }

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

        $unansweredQuestions = Question::where('is_answered', false)->with('category')->get();

        $categories = Category::all();

        return view('qa.admin', compact('unansweredQuestions', 'categories'));
    }

    public function respond(Request $request, Question $question)
    {
        $request->validate([
            'answer' => 'required|string|min:10', 
        ]);

        $question->update([
            'answer' => $request->answer,
            'is_answered' => true,
        ]);

        return redirect()->route('qa.admin')->with('success', 'Response sent successfully!');
    }

    public function destroy(Question $question)
    {
        if ($question) {
            $question->delete(); 
            return redirect()->route('qa.admin')->with('success', 'Question deleted successfully.');
        }

        return redirect()->route('qa.admin')->with('error', 'Question not found.');
    }

    public function updateAnswer(Request $request, Question $question)
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'answer' => 'required|string|max:1000',
        ]);

        $question->answer = $validated['answer'];
        $question->save();

        return redirect()->back()->with('success', 'Answer updated successfully!');
    }
    public function updateQuestion(Request $request, Question $question)
    {
        $user = Auth::user();
        if (!$user || !$user->is_admin) {
            abort(403, 'Unauthorized action.');
        }

        $validated = $request->validate([
            'question' => 'required|string|max:1000',
        ]);

        $question->question = $validated['question'];
        $question->save();

        return redirect()->back()->with('success', 'Question updated successfully!');
    }
}


