@extends('layouts.fullwidth')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-8">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Q&A Section</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-6 rounded-md">
            <strong>Success:</strong> {{ session('success') }}
        </div>
    @endif

    


    
    <div class="space-y-6">
        @foreach($categories as $category)
            <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
                <div class="flex justify-between items-center cursor-pointer" onclick="toggleQuestions('category-{{ $category->id }}')">
                    <h2 class="text-xl font-semibold text-gray-800">{{ $category->name }}</h2>
                    <svg class="w-6 h-6 transform transition-transform" id="arrow-{{ $category->id }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>

                <div id="category-{{ $category->id }}" class="space-y-4 mt-4 hidden">
                @foreach($category->questions->whereNotNull('answer') as $question)
                <div class="bg-gray-100 p-4 rounded">
                            <div class="flex justify-between items-center cursor-pointer" onclick="toggleAnswer('answer-{{ $question->id }}')">
                                <p class="font-semibold text-gray-800">{{ $question->question }}</p>
                                <svg class="w-6 h-6 transform transition-transform" id="answer-arrow-{{ $question->id }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>

                            <div id="answer-{{ $question->id }}" class="mt-4 hidden pl-4">
                                <div class="bg-gray-200 p-4 rounded">
                                    <p class="font-semibold text-gray-800">Answer:</p>
                                    <p class="text-gray-600">{{ $question->answer ?? 'No answer yet' }}</p>
                                </div>

                                @if (auth()->check() && auth()->user()->is_admin)
                                    <div class="mt-4 space-x-2">
                                        <button onclick="toggleEditAnswerForm('edit-answer-form-{{ $question->id }}')" class="bg-yellow-500 text-white py-2 px-4 rounded">Edit Answer</button>

                                        <button onclick="toggleEditQuestionForm('edit-question-form-{{ $question->id }}')" class="bg-yellow-500 text-white py-2 px-4 rounded">Edit Question</button>

                                        <form action="{{ route('qa.destroy', $question) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded">Delete</button>
                                        </form>
                                    </div>

                                    <div id="edit-answer-form-{{ $question->id }}" class="mt-4 hidden">
                                        <form action="{{ route('qa.updateAnswer', $question) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <textarea name="answer" class="border p-2 rounded w-full" required>{{ $question->answer }}</textarea>
                                            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded mt-2">Update Answer</button>
                                        </form>
                                    </div>

                                    <div id="edit-question-form-{{ $question->id }}" class="mt-4 hidden">
                                        <form action="{{ route('qa.updateQuestion', $question) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <textarea name="question" class="border p-2 rounded w-full" required>{{ $question->question }}</textarea>
                                            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded mt-2">Update Question</button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-8">
    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Ask your questions</h1>
        @auth
            <form action="{{ route('qa.store') }}" method="POST" class="mb-6">
                @csrf
                <div class="flex flex-col space-y-4">
                    <label for="question" class="font-semibold">Your question</label>
                    <textarea id="question" name="question" placeholder="Your question" class="border p-2 rounded @error('question') border-red-500 @enderror" required></textarea>
                    @error('question')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <label for="category_id" class="font-semibold">Select a category</label>
                    <select id="category_id" name="category_id" class="border p-2 rounded @error('category_id') border-red-500 @enderror" required>
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Ask Question</button>
                </div>
            </form>
            @else 
            <h1 class="text-1xl font-semibold text-gray-400 mb-6">log in to ask a question.</h1>
            @endauth
    </div>
<script>
    function toggleQuestions(categoryId) {
        const categoryDiv = document.getElementById(categoryId);
        const arrow = document.getElementById('arrow-' + categoryId.split('-')[1]);

        categoryDiv.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    }

    function toggleAnswer(answerId) {
        const answerDiv = document.getElementById(answerId);
        const arrow = document.getElementById('answer-arrow-' + answerId.split('-')[1]);

        answerDiv.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    }

    function toggleEditAnswerForm(formId) {
        const form = document.getElementById(formId);
        form.classList.toggle('hidden');
    }

    function toggleEditQuestionForm(formId) {
        const form = document.getElementById(formId);
        form.classList.toggle('hidden');
    }
</script>

@endsection
