@extends('layouts.fullwidth')

@section('content')

<!-- resources/views/contact/form.blade.php -->

<div class="max-w-2xl mx-auto p-6 bg-white shadow-lg rounded-lg mt-8">
    <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Contact Us</h1>

    <!-- Success message -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 mb-6 rounded-md">
            {{ session('success') }}
        </div>
    @endif

    <!-- Validation errors -->
    @if($errors->any())
        <div class="bg-red-100 text-red-800 p-4 mb-6 rounded-md">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Contact form -->
    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-medium mb-2">Your Email</label>
            <input type="email" name="email" id="email" required class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="mb-4">
            <label for="subject" class="block text-gray-700 text-sm font-medium mb-2">Subject</label>
            <input type="text" name="subject" id="subject" required class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="mb-4">
            <label for="message" class="block text-gray-700 text-sm font-medium mb-2">Your Message</label>
            <textarea name="message" id="message" required class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"></textarea>
        </div>

        <button type="submit" class="w-full bg-blue-600 text-white font-medium py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
    Send Message
</button>

    </form>
</div>


<script>
// Client-side validation using JavaScript
document.getElementById("contactForm").addEventListener("submit", function(event) {
    let valid = true;
    const email = document.getElementById("email");
    const subject = document.getElementById("subject");
    const message = document.getElementById("message");

    // Validate email format
    const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (!email.value.match(emailPattern)) {
        alert("Please enter a valid email.");
        valid = false;
    }

    // Validate message length
    if (message.value.length < 10) {
        alert("Message must be at least 10 characters.");
        valid = false;
    }

    // If validation fails, prevent form submission
    if (!valid) {
        event.preventDefault();
    }
});
</script>
@endsection