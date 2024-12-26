@extends('layouts.fullwidth')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Edit Newsletter</h1>
    <form action="{{ route('newsletters.update', $newsletter->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label for="title" class="block font-medium text-gray-700">Title</label>
            <input type="text" id="title" name="title" value="{{ $newsletter->title }}" required 
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
        </div>
        <div>
            <label for="content" class="block font-medium text-gray-700">Content</label>
            <textarea id="content" name="content" rows="5" required 
                      class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">{{ $newsletter->content }}</textarea>
        </div>
        <div>
            <label for="image" class="block font-medium text-gray-700">Image (optional)</label>
            <input type="file" id="image" name="image" 
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
        </div>
        <div>
            <button type="submit" 
                    class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
