@extends('layouts.fullwidth')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-8">

    <h1 class="text-2xl font-semibold text-gray-800 mb-6">Admin Dashboard</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-6 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <h2 class="text-xl font-semibold text-gray-800 mb-4">Manage Categories</h2>
    
    <form action="{{ route('categories.store') }}" method="POST" class="mb-6">
        @csrf
        <div class="flex items-center space-x-4">
            <input type="text" name="name" placeholder="Category Name" class="border p-2 rounded w-full" required>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">Add Category</button>
        </div>
    </form>

    <ul class="space-y-2">
        @foreach($categories as $category)
            <li class="flex items-center justify-between bg-gray-100 p-4 rounded">
                <span>{{ $category->name }}</span>
                <div class="flex space-x-2">
                    <form action="{{ route('categories.destroy', $category) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Delete</button>
                    </form>
                    <form action="{{ route('categories.update', $category) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="text" name="name" value="{{ $category->name }}" class="border p-1 rounded" required>
                        <button type="submit" class="text-blue-600">Update</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

    <h2 class="text-xl font-semibold text-gray-800 mt-8 mb-4">Unanswered Questions</h2>
    
    @foreach($categories as $category)
        @php
            $questions = $category->questions()->where('is_answered', false)->get();
        @endphp

        @if($questions->isNotEmpty())
            <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
                <div class="flex justify-between items-center cursor-pointer" onclick="toggleQuestions('category-{{ $category->id }}')">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $category->name }}</h3>
                    <svg class="w-6 h-6 transform transition-transform" id="arrow-{{ $category->id }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>

                <div id="category-{{ $category->id }}" class="space-y-4 mt-4 hidden">
                    @foreach($questions as $question)
                        <div class="bg-gray-100 p-4 rounded">
                            <div class="flex justify-between items-center cursor-pointer" onclick="toggleAnswer('answer-{{ $question->id }}')">
                                <p class="font-semibold text-gray-800">{{ $question->question }}</p>
                                <svg class="w-6 h-6 transform transition-transform" id="answer-arrow-{{ $question->id }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>

                            <div id="answer-{{ $question->id }}" class="mt-4 hidden pl-4">
                                <form action="{{ route('qa.respond', $question) }}" method="POST" class="mt-4">
                                    @csrf
                                    @method('PUT')
                                    <textarea name="answer" class="border p-2 rounded w-full" rows="4" required placeholder="Provide an answer..."></textarea>
                                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded mt-2">Respond to Question</button>
                                </form>

                                <form action="{{ route('qa.destroy', $question) }}" method="POST" class="mt-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white py-2 px-4 rounded mt-2">Delete Question</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    @endforeach

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
</script>
@endsection