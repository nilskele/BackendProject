@extends('layouts.fullwidth')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Add Newsletter</h1>
    <form action="{{ route('newsletters.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label for="title" class="block font-medium text-gray-700">Title</label>
            <input type="text" id="title" name="title" required 
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
        </div>
        <div>
            <label for="content" class="block font-medium text-gray-700">Content</label>
            <textarea id="content" name="content" rows="5" required 
                      class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
        </div>
        <div>
            <label for="image" class="block font-medium text-gray-700">Image</label>
            <input type="file" id="image" name="image" required 
                   class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm">
        </div>
        <div>
            <button type="submit" 
                    class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection
