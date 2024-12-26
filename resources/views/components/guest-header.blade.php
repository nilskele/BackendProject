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
                    <!-- Dropdown for authenticated user -->
                    

                    <!-- Link to Dashboard -->
                    <a href="{{ route('dashboard') }}" class="text-yellow-500 hover:text-yellow-300">Dashboard</a>
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Log out -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')" 
                                                 onclick="event.preventDefault();
                                                 this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <!-- Links for non-authenticated users -->
                    <a href="{{ route('login') }}" class="text-yellow-500 hover:text-yellow-300">Log In</a>
                    <a href="{{ route('register') }}" class="text-yellow-500 hover:text-yellow-300">Register</a>
                @endauth
            </nav>
        </div>
    </div>
</header>

