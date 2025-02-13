<div class="relative min-h-screen flex items-center overflow-hidden" x-data="{
    init() {
        this.videoElement = this.$refs.heroVideo;
    }
}">
    <!-- Video Background -->
    <div class="absolute inset-0 z-0">
        <video x-ref="heroVideo"
               class="absolute w-full h-full object-cover"
               autoplay
               loop
               muted
               playsinline>
            <source src="{{ asset('images/hero/FOOD.mp4') }}" type="video/mp4">
        </video>
        <div class="absolute inset-0 bg-gradient-to-br from-gray-900/95 via-gray-900/80 to-transparent"></div>
    </div>

    <!-- Main Content -->
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl">
            <!-- Theme Badge -->
            <div class="inline-flex items-center px-3 py-1.5 rounded-full bg-primary-500/10 border border-primary-500/20 mb-8">
                <span class="animate-pulse w-2 h-2 rounded-full bg-primary-500 mr-2"></span>
                <span class="text-sm font-medium text-primary-400">Taste by Laurie</span>
            </div>

            <!-- Main Title -->
            <div class="space-y-6">
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-playfair font-bold">
                    <span class="text-white block">Culinary Excellence</span>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary-400 to-primary-600 block">
                        Crafting Unforgettable Moments
                    </span>
                </h1>
                <p class="text-xl text-gray-300">
                    Experience the pinnacle of fine dining with our bespoke catering services.
                    Where every dish tells a story and every event becomes extraordinary.
                </p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-3 gap-8 mt-12">
                <div class="text-center">
                    <div class="text-2xl font-bold text-white">500+</div>
                    <div class="text-sm text-gray-400">Events</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-white">8+</div>
                    <div class="text-sm text-gray-400">Years</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-white">95%</div>
                    <div class="text-sm text-gray-400">Satisfaction</div>
                </div>
            </div>

            <!-- CTA Buttons -->
            <div class="flex flex-wrap gap-4 mt-12">
                <a href="#contact"
                   class="group relative inline-flex items-center px-8 py-4 text-sm font-medium text-white overflow-hidden rounded-lg">
                    <span class="absolute inset-0 w-3 bg-primary-600 transition-all duration-[250ms] ease-out group-hover:w-full"></span>
                    <span class="relative flex items-center gap-2">
                        Book Your Event
                        <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </span>
                </a>

                <a href="#menu"
                   class="group inline-flex items-center px-6 py-3 text-sm font-medium text-primary-400 hover:text-primary-300 transition-colors">
                    <span>Explore Menu</span>
                    <svg class="w-4 h-4 ml-2 transform transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 right-8 hidden lg:flex flex-col items-center animate-bounce">
        <span class="text-sm text-white/70 writing-mode-vertical transform rotate-180">Scroll</span>
        <svg class="w-5 h-5 text-white/70 mt-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</div>

<style>
.writing-mode-vertical {
    writing-mode: vertical-rl;
}
</style>
