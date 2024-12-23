@extends('layouts.fullwidth')

    <!-- About Us Section -->
    @section('content')

        <div class="w-full px-6 sm:px-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Left Text Content -->
                <div class="flex flex-col justify-center">
                    <h2 class="text-3xl font-semibold text-blue-600 mb-4">About Us</h2>
                    <p class="text-lg text-gray-700 mb-6">
                        Welcome to our website! We are a passionate team dedicated to bringing you the best experience possible. 
                        Our mission is to help you achieve your goals, whether it's through our products, services, or content.
                    </p>
                    <p class="text-lg text-gray-700">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus nec ante dui. Phasellus vitae lorem ut 
                        nulla malesuada egestas. Curabitur quis tincidunt dui. Curabitur laoreet, nisl id pharetra vulputate, dui 
                        enim pharetra nisl, at dictum nisi nisi nec nunc.
                    </p>
                </div>

                <!-- Right Image Content -->
                <div class="flex justify-center items-center">
                    <img src="{{ asset('images/logo1.png') }}" alt="Your Image" class="w-full h-full object-cover rounded-lg shadow-lg">
                </div>
            </div>
        </div>
        @endsection

    <!-- Q&A Section -->

