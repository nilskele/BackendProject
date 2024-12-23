<header class="bg-blue-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
            <img class="h-20" src="{{ asset('images/logo1.png') }}" alt="Logo 1">
            </div>
            <!-- Navbar Links -->
            <nav class="flex space-x-4">
                <a href="/" class="text-yellow-500 hover:text-yellow-300">Home</a>
                <a href="{{ route('about-us') }}" class="text-yellow-500 hover:text-yellow-300">About Us</a>
                <a href="/QA" class="text-yellow-500 hover:text-yellow-300">Q&A</a>
                <a href="/contact" class="text-yellow-500 hover:text-yellow-300">Contact Us</a>

                <!-- Authentication Links -->
                @auth
                    <a href="{{ route('dashboard') }}" class="text-yellow-500 hover:text-yellow-300">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-yellow-500 hover:text-yellow-300">Log In</a>
                    <a href="{{ route('register') }}" class="text-yellow-500 hover:text-yellow-300">Register</a>
                @endauth
            </nav>
        </div>
    </div>
</header>