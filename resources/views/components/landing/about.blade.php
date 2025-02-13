<section id="about" class="relative py-24 bg-gray-50 dark:bg-gray-800 overflow-hidden" x-data="{
    stats: [
        { value: 0, target: 8, suffix: '+', label: 'Years Experience' },
        { value: 0, target: 95, suffix: '%', label: 'Client Satisfaction' },
        { value: 0, target: 500, suffix: '+', label: 'Events Catered' },
        { value: 0, target: 30, suffix: '+', label: 'Team Members' }
    ],
    initStats() {
        this.stats.forEach((stat, index) => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.animateNumber(index);
                    }
                });
            }, { threshold: 0.5 });

            observer.observe(this.$refs.statsSection);
        });
    },
    animateNumber(index) {
        const interval = setInterval(() => {
            if (this.stats[index].value < this.stats[index].target) {
                this.stats[index].value++;
            } else {
                clearInterval(interval);
            }
        }, 20);
    }
}">
    <!-- Background Elements -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-primary-100 dark:bg-primary-900/20 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Image Column -->
            <div class="relative order-2 lg:order-1 fade-in-left">
                <div class="relative group">
                    <div class="aspect-w-4 aspect-h-5">
                        <img src="{{ asset('images/about us/madam.jpg') }}"
                             alt="Chef preparing food"
                             class="object-cover rounded-2xl shadow-2xl transition duration-300 group-hover:scale-105">
                    </div>

                    <!-- Experience Badge -->
                    <div class="absolute -top-6 -left-6 bg-white dark:bg-gray-900 p-4 rounded-2xl shadow-xl">
                        <div class="flex items-center space-x-2">
                            <div class="p-2 bg-primary-100 dark:bg-primary-900/50 rounded-lg">
                                <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <span class="text-sm font-bold text-gray-900 dark:text-white">Since 2015</span>
                        </div>
                    </div>

                    <!-- Client Satisfaction Badge -->
                    <div class="absolute -bottom-6 -right-6 bg-white dark:bg-gray-900 p-6 rounded-2xl shadow-xl">
                        <div class="flex items-center space-x-4">
                            <div class="p-3 bg-primary-100 dark:bg-primary-900/50 rounded-lg">
                                <svg class="w-8 h-8 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-gray-900 dark:text-white">98%</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">Client Satisfaction</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Column -->
            <div class="order-1 lg:order-2 space-y-8 fade-in-right">
                <div class="space-y-4">
                    <h2 class="text-primary-600 dark:text-primary-400 font-medium tracking-wide uppercase">About Us</h2>
                    <h3 class="text-4xl lg:text-5xl font-playfair font-bold text-gray-900 dark:text-white">
                        Crafting Culinary Excellence Since 2015
                    </h3>
                    <div class="w-20 h-1.5 bg-primary-600 dark:bg-primary-400 rounded-full"></div>
                </div>

                <p class="text-lg text-gray-600 dark:text-gray-300">
                    We blend artisanal expertise with innovative culinary techniques to create extraordinary dining experiences. Our passionate team of chefs and event specialists work tirelessly to ensure every detail exceeds your expectations.
                </p>

                <!-- Features Grid -->
                <div class="grid sm:grid-cols-2 gap-8">
                    <template x-for="(feature, index) in [
                        { icon: 'M5 13l4 4L19 7', title: 'Premium Ingredients', desc: 'Sourced from local and international suppliers' },
                        { icon: 'M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z', title: '24/7 Support', desc: 'Always here to assist you' },
                        { icon: 'M12 6v6m0 0v6m0-6h6m-6 0H6', title: 'Customizable Menus', desc: 'Tailored to your preferences' },
                        { icon: 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', title: 'Quality Assured', desc: 'Highest standards maintained' }
                    ]">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="p-3 bg-primary-100 dark:bg-primary-900/50 rounded-lg">
                                    <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" x-bind:d="feature.icon"/>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 dark:text-white" x-text="feature.title"></h4>
                                <p class="text-gray-600 dark:text-gray-400" x-text="feature.desc"></p>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Stats Section -->
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-8 pt-8" x-ref="statsSection" x-init="initStats()">
                    <template x-for="stat in stats">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary-600 dark:text-primary-400">
                                <span x-text="stat.value"></span><span x-text="stat.suffix"></span>
                            </div>
                            <div class="text-sm text-gray-600 dark:text-gray-400" x-text="stat.label"></div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</section>
