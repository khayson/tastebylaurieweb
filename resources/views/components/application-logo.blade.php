<div class="relative transform hover:scale-105 transition-all duration-300" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }">
    <!-- Light mode logo -->
    <img src="{{ asset('images/logo/logo.png') }}"
         {{ $attributes->merge(['class' => 'h-14 w-auto transition-all duration-300 invert dark:invert-0 hover:brightness-110']) }}
         :class="{ 'opacity-0': darkMode, 'opacity-100': !darkMode }"
         alt="{{ config('app.name', 'Taste by Laurie') }}">

    <!-- Dark mode logo -->
    <img src="{{ asset('images/logo/logo.png') }}"
         {{ $attributes->merge(['class' => 'h-14 w-auto absolute top-0 left-0 transition-all duration-300 invert dark:invert-0 hover:brightness-110']) }}
         :class="{ 'opacity-100': darkMode, 'opacity-0': !darkMode }"
         alt="{{ config('app.name', 'Taste by Laurie') }}">
</div>
