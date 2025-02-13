<nav x-data="{
    open: false,
    scrolled: false,
    selectedItem: null,
    init() {
        this.scrolled = window.pageYOffset > 20;
        window.addEventListener('scroll', () => {
            this.scrolled = window.pageYOffset > 20;
        });
    }
}"
     @click.outside="open = false"
     @keydown.escape="open = false"
     class="fixed top-0 w-full z-50 transition-all duration-500"
     :class="{ 'bg-white/90 backdrop-blur-lg shadow-lg dark:bg-gray-800/90': scrolled || open,
               'bg-transparent': !scrolled && !open }">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Left Side -->
            <div class="flex items-center">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="/" class="group transition-transform duration-300 hover:scale-105">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200 transition-colors duration-300" />
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden sm:flex sm:space-x-8 sm:ms-10">
                    <x-nav-link :href="route('dashboard')"
                               :active="request()->routeIs('dashboard')"
                               class="relative overflow-hidden group py-2">
                        <span class="relative z-10 transition-colors duration-300">{{ __('Dashboard') }}</span>
                        <div class="absolute bottom-0 left-0 w-full h-0.5 bg-primary-500 transform origin-left scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></div>
                    </x-nav-link>

                    <x-nav-link :href="route('admin.testimonials.index')"
                               :active="request()->routeIs('admin.testimonials.*')"
                               class="relative overflow-hidden group py-2">
                        <span class="relative z-10 transition-colors duration-300">{{ __('Testimonials') }}</span>
                        <div class="absolute bottom-0 left-0 w-full h-0.5 bg-primary-500 transform origin-left scale-x-0 transition-transform duration-300 group-hover:scale-x-100"></div>
                    </x-nav-link>
                </div>
            </div>

            <!-- Right Side -->
            <div class="flex items-center space-x-4">
                <!-- Dark Mode Toggle -->
                <div class="hidden sm:block">
                    <x-dark-mode-toggle />
                </div>

                <!-- Settings Dropdown -->
                <div class="hidden sm:block relative">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="group inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-lg text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition-all duration-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1 transition-transform duration-300 group-hover:translate-y-0.5">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <div class="divide-y divide-gray-100 dark:divide-gray-700">
                                <x-dropdown-link :href="route('profile.edit')" class="group">
                                    <div class="flex items-center space-x-2">
                                        <svg class="w-5 h-5 text-gray-400 group-hover:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                        <span>{{ __('Profile') }}</span>
                                    </div>
                                </x-dropdown-link>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')"
                                                   onclick="event.preventDefault(); this.closest('form').submit();"
                                                   class="group">
                                        <div class="flex items-center space-x-2">
                                            <svg class="w-5 h-5 text-gray-400 group-hover:text-primary-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                            </svg>
                                            <span>{{ __('Log Out') }}</span>
                                        </div>
                                    </x-dropdown-link>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center sm:hidden">
                    <x-dark-mode-toggle class="mr-2" />
                    <button @click="open = !open"
                            class="inline-flex items-center justify-center p-2 rounded-lg text-gray-500 dark:text-gray-400
                                   hover:text-gray-700 dark:hover:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700
                                   focus:outline-none transition-all duration-300">
                        <span class="sr-only">Open main menu</span>
                        <div class="relative w-6 h-6">
                            <span class="absolute inset-0 w-6 h-0.5 bg-current transform transition-all duration-300"
                                  :class="{'rotate-45 translate-y-2.5': open, 'translate-y-1': !open}"></span>
                            <span class="absolute inset-0 w-6 h-0.5 bg-current transform transition-all duration-300"
                                  :class="{'opacity-0': open, 'translate-y-3': !open}"></span>
                            <span class="absolute inset-0 w-6 h-0.5 bg-current transform transition-all duration-300"
                                  :class="{'-rotate-45 translate-y-2.5': open, 'translate-y-5': !open}"></span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Navigation Menu -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-4"
         @click.away="open = false"
         class="sm:hidden border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')"
                                 :active="request()->routeIs('dashboard')"
                                 class="flex items-center space-x-2 px-4 py-3 mx-4 rounded-lg transition-all duration-300
                                        hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                <span>{{ __('Dashboard') }}</span>
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.testimonials.index')"
                                 :active="request()->routeIs('admin.testimonials.*')"
                                 class="flex items-center space-x-2 px-4 py-3 mx-4 rounded-lg transition-all duration-300
                                        hover:bg-gray-100 dark:hover:bg-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                </svg>
                <span>{{ __('Testimonials') }}</span>
            </x-responsive-nav-link>
        </div>

        <!-- Mobile Settings -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-700">
            <div class="px-6 py-2">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="space-y-1 mt-3">
                <x-responsive-nav-link :href="route('profile.edit')"
                                     class="flex items-center space-x-2 px-4 py-3 mx-4 rounded-lg transition-all duration-300
                                            hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>{{ __('Profile') }}</span>
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                                         onclick="event.preventDefault(); this.closest('form').submit();"
                                         class="flex items-center space-x-2 px-4 py-3 mx-4 rounded-lg transition-all duration-300
                                                hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                        </svg>
                        <span>{{ __('Log Out') }}</span>
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
// Add this to handle any global event selections
document.addEventListener('alpine:init', () => {
    Alpine.store('navigation', {
        selectedEvent: null,
        setSelectedEvent(event) {
            this.selectedEvent = event;
        }
    });
});
</script>
