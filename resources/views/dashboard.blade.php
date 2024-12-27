

@extends('layouts.fullwidth')

@section('content')



<!-- resources/views/admin/index.blade.php -->
@if ($user && $user->is_admin)
<div class="max-w-7xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-8">
    <h1 class="text-3xl font-semibold text-gray-800 mb-6">Admin Dashboard</h1>

    <!-- Success or error messages -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-6 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 p-4 mb-6 rounded-md">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Newsletter Section -->
        <div class="bg-blue-50 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Manage Newsletters</h2>
            <p class="text-gray-600 mb-4">Create, update, and delete newsletters.</p>
            <a href="{{ route('welcome') }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Manage Newsletters</a>
        </div>

        <!-- Messages Section -->
        <div class="bg-blue-50 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">View Contact Messages</h2>
            <p class="text-gray-600 mb-4">Review and respond to user messages sent from the contact form.</p>
            <a href="{{ route('contact.messages') }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">View Messages</a>
        </div>

        <!-- Users Section -->
        <div class="bg-blue-50 p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold text-gray-700 mb-4">Manage Users</h2>
    <p class="text-gray-600 mb-4">View, add, and manage user accounts.</p>
    <a href="{{ route('user_management.index') }}" 
       class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500">
        Manage Users
    </a>
</div>

        <div class="bg-blue-50 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Manage Q&A</h2>
            <p class="text-gray-600 mb-4">Answer questions submitted by users.</p>
            <a href="{{ route('qa.admin') }}" class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500">Manage Q&A</a>
        </div>
    </div>

    <!-- Recent Activities Section -->
    

</div>
@endif
@endsection