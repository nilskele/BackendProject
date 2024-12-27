<header class="bg-blue-600 text-white shadow-lg">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <img class="h-16 md:h-20 transition-all ease-in-out duration-300 transform hover:scale-105" src="{{ asset('images/logo1.png') }}" alt="Logo 1">
            </div>

            <!-- Navbar Links -->
            <nav class="flex space-x-6 md:space-x-8 text-lg font-medium">
                <!-- Home Link -->
                <a href="/" class="text-yellow-500 hover:text-yellow-300 transition-colors duration-300 ease-in-out transform hover:scale-105 
                    {{ request()->is('/') ? 'text-yellow-300 underline' : '' }}">
                    Home
                </a>
                
                <!-- About Us Link -->
                <a href="{{ route('about-us') }}" class="text-yellow-500 hover:text-yellow-300 transition-colors duration-300 ease-in-out transform hover:scale-105 
                    {{ request()->is('about-us') ? 'text-yellow-300 underline' : '' }}">
                    About Us
                </a>

                <!-- Q&A Link -->
                <a href="{{ route('qa.user') }}" class="text-yellow-500 hover:text-yellow-300 transition-colors duration-300 ease-in-out transform hover:scale-105 
                    {{ request()->is('qa/user') ? 'text-yellow-300 underline' : '' }}">
                    Q&A
                </a>

                <!-- Contact Us Link -->
                <a href="/contact" class="text-yellow-500 hover:text-yellow-300 transition-colors duration-300 ease-in-out transform hover:scale-105 
                    {{ request()->is('contact') ? 'text-yellow-300 underline' : '' }}">
                    Contact Us
                </a>

                <!-- Authentication Links -->
                @auth
                    <!-- Link to Dashboard -->
                    <a href="{{ route('dashboard') }}" class="text-yellow-500 hover:text-yellow-300 transition-colors duration-300 ease-in-out transform hover:scale-105 
                        {{ request()->is('dashboard') ? 'text-yellow-300 underline' : '' }}">
                        Dashboard
                    </a>

                    <!-- Dropdown for authenticated user -->
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
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
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <!-- Links for non-authenticated users -->
                    <a href="{{ route('login') }}" class="text-yellow-500 hover:text-yellow-300 transition-colors duration-300 ease-in-out transform hover:scale-105 
                        {{ request()->is('login') ? 'text-yellow-300 underline' : '' }}">
                        Log In
                    </a>
                    <a href="{{ route('register') }}" class="text-yellow-500 hover:text-yellow-300 transition-colors duration-300 ease-in-out transform hover:scale-105 
                        {{ request()->is('register') ? 'text-yellow-300 underline' : '' }}">
                        Register
                    </a>
                @endauth
            </nav>
        </div>
    </div>
</header>


