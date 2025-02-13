<section id="services" class="relative  py-20 bg-white dark:bg-gray-900 overflow-hidden" x-data="{
    activeTab: 'weddings',
    services: {
        weddings: {
            title: 'Wedding Catering',
            description: 'Transform your special day into an unforgettable experience with our bespoke wedding catering services.',
            features: [
                'Customized Wedding Menus',
                'Professional Service Staff',
                'Complete Setup & Cleanup',
            ],
            image: '/images/services/wedding.jpg'
        },
        corporate: {
            title: 'Corporate Events',
            description: 'Elevate your business events with professional catering solutions designed for corporate excellence.',
            features: [
                'Breakfast & Lunch Packages',
                'Conference Catering',
                'Corporate Party Planning',
                'Brand-Aligned Presentations',
                'Time-Sensitive Delivery',
                'Executive Dining Options'
            ],
            image: '/images/services/corporate.jpg'
        },
        private: {
            title: 'Private Events',
            description: 'Create lasting memories with exceptional catering for your private celebrations and gatherings.',
            features: [
                'Birthday Celebrations',
                'Anniversary Parties',
                'Family Reunions',
                'Holiday Gatherings',
                'Cocktail Receptions',
                'Custom Theme Planning'
            ],
            image: '/images/services/private.jpg'
        }
    }
}">
    <!-- Decorative Background -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-50/50 via-transparent to-primary-50/20 dark:from-primary-900/20 dark:to-primary-900/10"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <span class="text-primary-600 dark:text-primary-400 font-medium tracking-wider uppercase">Our Services</span>
            <h2 class="mt-3 text-4xl font-playfair font-bold text-gray-900 dark:text-white sm:text-5xl">
                Exceptional Catering Solutions
            </h2>
            <p class="mt-4 text-xl text-gray-600 dark:text-gray-300">
                Crafting memorable experiences through culinary excellence
            </p>
        </div>

        <!-- Service Navigation Tabs -->
        <div class="flex justify-center space-x-4 mb-12">
            <template x-for="(service, key) in services" :key="key">
                <button
                    @click="activeTab = key"
                    :class="{'bg-primary-600 text-white': activeTab === key,
                            'bg-gray-100 text-gray-600 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700': activeTab !== key}"
                    class="px-6 py-3 rounded-full font-medium transition-all duration-300 transform hover:scale-105"
                    :data-tab="key">
                    <span x-text="service.title"></span>
                </button>
            </template>
        </div>

        <!-- Service Content -->
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Service Information -->
            <template x-for="(service, key) in services" :key="key">
                <div x-show="activeTab === key"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform translate-x-4"
                     x-transition:enter-end="opacity-100 transform translate-x-0"
                     class="space-y-8">
                    <div class="space-y-4">
                        <h3 class="text-3xl font-playfair font-bold text-gray-900 dark:text-white" x-text="service.title"></h3>
                        <p class="text-lg text-gray-600 dark:text-gray-300" x-text="service.description"></p>
                    </div>

                    <!-- Features Grid -->
                    <div class="grid sm:grid-cols-2 gap-4">
                        <template x-for="(feature, index) in service.features" :key="index">
                            <div class="flex items-center space-x-3 p-4 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                                <svg class="w-5 h-5 text-primary-600 dark:text-primary-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-gray-700 dark:text-gray-300" x-text="feature"></span>
                            </div>
                        </template>
                    </div>

                    <!-- CTA Button -->
                    <div class="pt-4">
                        <a :href="'/services/' + key"
                           class="group inline-flex items-center px-6 py-3 text-lg font-medium text-white bg-primary-600 rounded-lg hover:bg-primary-700 transition-colors">
                            Learn More
                            <svg class="ml-2 w-5 h-5 transform transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </template>

            <!-- Service Image -->
            <div class="relative h-[500px] rounded-2xl overflow-hidden shadow-2xl">
                <template x-for="(service, key) in services" :key="key">
                    <div x-show="activeTab === key"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         class="absolute inset-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        <img :src="service.image"
                             :alt="service.title"
                             class="w-full h-full object-cover"
                             onerror="this.src='{{ asset('images/services/wedding-catering.jpg') }}'">
                    </div>
                </template>
            </div>
        </div>
    </div>
</section>
