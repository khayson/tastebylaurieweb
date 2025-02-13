<nav x-data="{ open: false }"
     class="fixed w-full z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-100 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo and Brand -->
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <x-application-logo class="h-8 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    <span class="ml-3 text-lg font-playfair font-bold text-gray-900 dark:text-white">Luxury Catering</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            {{-- <div class="hidden sm:flex sm:items-center sm:space-x-6 lg:space-x-8">
                <x-nav-link href="#about" :active="false">
                    {{ __('About') }}
                </x-nav-link>
                <x-nav-link href="#services" :active="false">
                    {{ __('Services') }}
                </x-nav-link>
                <x-nav-link href="#menu" :active="false">
                    {{ __('Menu') }}
                </x-nav-link>
                <x-nav-link href="#contact" :active="false">
                    {{ __('Contact') }}
                </x-nav-link>
                <x-dark-mode-toggle />
                <x-primary-button>
                    {{ __('Book Now') }}
                </x-primary-button>
            </div> --}}

            <!-- Mobile menu button and dark mode toggle -->
            <div class="flex items-center space-x-2 sm:hidden">
                <x-dark-mode-toggle />
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 focus:text-gray-900 dark:focus:text-gray-100 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    {{-- <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         class="sm:hidden bg-white/95 dark:bg-gray-900/95 backdrop-blur-md"
         @click.away="open = false">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="#about" :active="false" @click="open = false">
                {{ __('About') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#services" :active="false" @click="open = false">
                {{ __('Services') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#menu" :active="false" @click="open = false">
                {{ __('Menu') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link href="#contact" :active="false" @click="open = false">
                {{ __('Contact') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-4 pb-6 border-t border-gray-200 dark:border-gray-700">
            <x-primary-button class="w-full justify-center" @click="open = false">
                {{ __('Book Now') }}
            </x-primary-button>
        </div>
    </div> --}}
</nav>
