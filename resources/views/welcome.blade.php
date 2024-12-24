@extends('layouts.fullwidth')

@section('content')

<!-- Welcome Section with Background Image -->
<div class="relative bg-cover bg-center h-96" style="background-image: url('{{ asset('images/logo1.png') }}');">
    <div class="absolute inset-0 bg-white opacity-10"></div> <!-- Overlay for darkening the background image -->
    <div class="relative z-10 font-bold text-center text-blue-600 py-32">
        <h2 class="text-4xl font-semibold mb-4">Welcome to Wliquid</h2>
        <p class="text-xl mb-8">
            We're glad to have you here! Wliquid is a place where innovation meets excellence. Join us in our journey as we bring 
            you the best content, services, and products.
        </p>
    </div>
</div>

<!-- Newsletters Title -->
<div class="text-center my-12">
    <h2 class="text-3xl font-bold text-blue-600">Newsletters</h2>
</div>
@if($user && $user->is_admin)
    <div class="text-center mb-8">
        <button class="bg-blue-600 text-white py-2 px-4 rounded">
            Add Newsletter
        </button>
    </div>
@endif

<!-- Newsletter Section -->
<div style="display: flex; flex-wrap: wrap; justify-content: space-between;">

    @foreach($newsletters as $index => $newsletter)
        <div style="background-color: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); width: 45%; margin-bottom: 20px; display: flex; flex-direction: row;">
            <!-- Left Text Content -->
            <div style="flex: 1;">
                <h3 style="font-size: 24px; color: #1E40AF; font-weight: bold;">{{ $newsletter['title'] }}</h3>
                
                <!-- Conditionally show truncated content or full content -->
                <p style="font-size: 16px; color: #6B7280; margin-bottom: 15px;">
                    @if($showFullText[$index])
                        {{ $newsletter['content'] }}
                    @else
                        {{ \Illuminate\Support\Str::limit($newsletter['content'], 100) }}
                    @endif
                </p>

                <!-- More Info Button -->
                @if(strlen($newsletter['content']) > 100)
                    <a href="{{ url()->current() . '?show_more=' . $index }}" 
                       style="color: #1E40AF; text-decoration: none;">
                        @if($showFullText[$index])
                            <a href="{{ url()->current() . '?show_less=1' }}" 
                               style="color: #1E40AF; text-decoration: none;">
                                Show Less
                            </a>
                        @else
                            More Info
                        @endif
                    </a>
                @endif
                @if($user && $user->is_admin)
            <div class="flex; flex-wrap: wrap; justify-content: space-between; mt-2 space-x-5" >
                <button class="bg-yellow-500 text-white py-2 px-4 rounded">
                    Edit
                </button>
                <button class="bg-red-500 text-white py-2 px-4 rounded">
                    Remove
                </button>
            </div>
        @endif
            </div>

            <!-- Right Image Content -->
            <div style="flex: 0 0 30%; margin-left: 20px;">
                <img src="{{ $newsletter['image'] }}" alt="Newsletter Image" style="width: 100%; height: auto; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
            </div>
        </div>
    @endforeach

</div>

@endsection
