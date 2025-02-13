<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Luxury Catering') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo/logo.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo/logo.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/logo/logo.png') }}">
        <link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}" type="image/png">

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600|playfair-display:400,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @include('components.landing.styles')
    </head>
    <body class="font-sans antialiased bg-white dark:bg-gray-900" x-data="scrollAnimation">
        <!-- Navigation -->
        @include('components.landing.navigation')

        <!-- Hero Section -->
        @include('components.landing.hero')

        <!-- About Section -->
        @include('components.landing.about')

        <!-- Services Section -->
        @include('components.landing.services')

        <!-- Menu Section -->
        @include('components.landing.menu')

        <!-- Testimonials Section -->
        <x-landing.testimonials />

        <!-- Events Section -->
        <x-landing.events :pastEvents="$pastEvents" />

        <!-- Contact Section -->
        @include('components.landing.contact')

        <!-- Footer -->
        @include('components.landing.footer')

        <!-- Back to Top Button -->
        @include('components.landing.back-to-top')

        <!-- Scripts -->
        @include('components.landing.scripts')
    </body>
</html>
