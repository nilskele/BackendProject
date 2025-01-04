@extends('layouts.fullwidth')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Contact Messages</h1>

    <!-- Success or error messages -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-6 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <!-- Non-Responded Messages -->
    <div class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Non-Responded Messages</h2>
        @if($nonRespondedMessages->isEmpty())
            <p class="text-gray-600">No messages waiting for a response.</p>
        @else
            <ul>
                @foreach($nonRespondedMessages as $message)
                    <li class="bg-gray-100 p-4 mb-4 rounded-md shadow">
                        <p><strong>From:</strong> {{ $message->email }}</p>
                        <p><strong>Subject:</strong> {{ $message->subject }}</p>
                        <p><strong>Message:</strong> {{ $message->message }}</p>
                        <form method="POST" action="{{ route('contact.respond', $message->id) }}">
                            @csrf
                            <textarea name="response" class="w-full mt-4 p-2 border rounded-md" rows="4" placeholder="Write your response here..."></textarea>
                            <button type="submit" class="bg-blue-600 text-white py-2 px-4 mt-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                Send Response
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <!-- Responded Messages -->
    <div>
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Responded Messages</h2>
        <div class="flex justify-end mt-6">
    <form action="{{ route('contact.clearBacklog') }}" method="POST" onsubmit="return confirm('Are you sure you want to clear all responded messages?');">
        @csrf
        <button type="submit" class="bg-red-600 text-white font-medium px-4 py-2 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
            Clear Responded Messages
        </button>
    </form>
</div>

        @if($respondedMessages->isEmpty())
            <p class="text-gray-600">No messages have been responded to yet.</p>
        @else
            <ul>
                @foreach($respondedMessages as $message)
                    <li class="bg-green-100 p-4 mb-4 rounded-md shadow">
                        <p><strong>From:</strong> {{ $message->email }}</p>
                        <p><strong>Subject:</strong> {{ $message->subject }}</p>
                        <p><strong>Message:</strong> {{ $message->message }}</p>
                        <p><strong>Your Response:</strong> {{ $message->response }}</p>
                        <p class="text-gray-500 text-sm">Responded on: {{ $message->updated_at->format('M d, Y') }}</p>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
@endsection
