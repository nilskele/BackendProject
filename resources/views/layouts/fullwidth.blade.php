<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('images/4Yimh4sLhAGNKd0fMwjlkwkQfO0nLssIxHxVubbV.jpg') }}">
        <title>WLiquid</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased min-h-screen flex flex-col">

        
        <x-guest-header />

      
        <div class="flex-grow">
            <div class="container mx-auto px-4 py-6">
                @yield('content') 
            </div>
        </div>

        
        <x-guest-footer />

    </body>
</html>

