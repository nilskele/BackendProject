@extends('layouts.fullwidth')

@section('content')
<div class="container mx-auto">
<div class="flex justify-between items-center mb-4">
    <div class="w-2/3">
        <h1 class="text-3xl font-bold mb-4">{{ $newsletter->title }}</h1>
        <p>{{ $newsletter->content }}</p>
    </div>
    <div class="w-1/3">
        @if($newsletter->image)
            <img src="{{ asset('storage/' . $newsletter->image) }}" alt="Newsletter Image" class="rounded-lg shadow-lg w-full h-auto">
        @endif
    </div>
</div>

    <div class="mt-6">
        <h3 class="text-xl font-semibold">Comments</h3>

        @foreach($newsletter->comments as $comment)
        <div class="comment bg-gray-100 p-4 mb-4 rounded">
            <strong>{{ $comment->user->name }}</strong> 
            <span class="text-gray-500 text-sm">{{ $comment->created_at->format('d-m-Y H:i') }}</span>
            <p>{{ $comment->content }}</p>
        </div>
        @endforeach

        @auth
        <form id="comment-form" method="POST" action="{{ route('comments.store', $newsletter) }}">
            @csrf
            <div>
                <textarea id="comment-content" name="content" rows="4" placeholder="Write your comment..." class="w-full border border-gray-300 rounded-md p-2"></textarea>
                <p id="error-message" class="text-red-500 text-sm mt-2" style="display:none;">Comment cannot be empty!</p>
            </div>
            <div class="mt-4">
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">
                    Submit Comment
                </button>
            </div>
        </form>
        @else
        <p class="text-sm text-gray-500">You must be logged in to leave a comment.</p>
        <a href="{{ route('login') }}" class="text-yellow-500 hover:text-yellow-300">Log In</a>
        @endauth
    </div>
</div>

<script>

document.getElementById('comment-form').addEventListener('submit', function(event) {
    var commentContent = document.getElementById('comment-content').value.trim();
    var errorMessage = document.getElementById('error-message');

    if (!commentContent) {
        event.preventDefault(); 
        errorMessage.style.display = 'block'; 
    } else {
        errorMessage.style.display = 'none'; 
    }
});
</script>
@endsection
