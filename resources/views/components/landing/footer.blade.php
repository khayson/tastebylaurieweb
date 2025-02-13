<footer class="relative bg-gray-900 text-white pt-20 pb-10 overflow-hidden">
    <!-- Decorative Elements -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-900/20 to-transparent"></div>
        <div class="absolute bottom-0 left-0 w-32 h-32 bg-primary-600/10 rounded-full blur-2xl"></div>
        <div class="absolute top-0 right-0 w-32 h-32 bg-primary-600/10 rounded-full blur-2xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Main Footer Content -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-12 mb-16">
            <div class="sm:col-span-2 lg:col-span-1">
                @include('components.landing.footer-sections.company')
            </div>
            <div>
                @include('components.landing.footer-sections.quick-links')
            </div>
            <div>
                @include('components.landing.footer-sections.contact-info')
            </div>
            <div class="sm:col-span-2 lg:col-span-1">
                @include('components.landing.footer-sections.newsletter')
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="border-t border-gray-800 pt-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <p class="text-gray-400 text-sm text-center md:text-left">
                    © {{ date('Y') }} Taste by Laurie. All rights reserved.
                </p>
                <div class="flex justify-center md:justify-end space-x-6">
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-300">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-300">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm transition-colors duration-300">Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>
</footer>
