@extends('layouts.fullwidth')

@section('content')

<div class="container mx-auto p-6">
    <h1 class="text-2xl font-semibold mb-6">Partners who offer liquidations:</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($users as $user)
        <a href="{{ route('user.dashboard', $user->id) }}" class="block bg-white rounded-lg shadow-md hover:shadow-lg transition p-4">
            <div class="flex items-center">
                <div class="w-16 h-16 rounded-full overflow-hidden">
                    @if ($user->profile_image)
                        <img src="{{ asset('storage/' . $user->profile_image) }}" alt="{{ $user->name }}'s Profile Image" class="w-full h-full object-cover">
                    @else
                        <p class="text-gray-500 bg-gray-200 p-4 rounded-full text-center">No Image</p>
                    @endif
                </div>
                <div class="ml-4">
                    <h2 class="font-semibold text-lg">{{ $user->name }}</h2>
                    <p class="text-sm text-gray-600">{{ $user->bio ?? 'No bio available' }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>

@endsection
