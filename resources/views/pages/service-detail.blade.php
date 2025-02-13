<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{
          darkMode: localStorage.getItem('darkMode') === 'true',
          service: '{{ $service }}',
          serviceData: {
              weddings: {
                  title: 'Wedding Catering',
                  description: 'Transform your special day into an unforgettable culinary experience with our bespoke wedding catering services.',
                  longDescription: 'Our wedding catering service is designed to make your special day truly memorable. We understand that every wedding is unique, and we work closely with you to create a customized menu that reflects your style and preferences. From elegant cocktail hours to grand reception dinners, we handle every detail with precision and care.',
                  features: [
                      {
                          title: 'Customized Wedding Menus',
                          description: 'Work with our expert chefs to create a personalized menu that perfectly matches your wedding theme and preferences.'
                      },
                      {
                          title: 'Professional Service Staff',
                          description: 'Our highly trained staff ensures impeccable service throughout your event, attending to every detail with grace and professionalism.'
                      },
                      {
                          title: 'Complete Setup & Cleanup',
                          description: 'We handle all aspects of setup and cleanup, allowing you and your guests to fully enjoy the celebration.'
                      },
                  ],
                  packages: [
                      {
                          name: 'Essential Wedding Package',
                          features: [
                              'Buffet service',
                              'Plated service',
                              'Takeaway service',
                              'Professional staff'
                          ]
                      },
                      {
                          name: 'Premium Wedding Package',
                          features: [
                              'Luxury Buffet service',
                              'Three course meal service',
                              'VIP Food Boxes',
                              'Professional staff'
                          ]
                      }
                  ],
                  image: '/images/services/wedding.jpg',
                  gallery: [
                      '/images/services/wedding/wedding-1.jpg',
                      '/images/services/wedding/wedding-2.jpg',
                      '/images/services/wedding/wedding-3.mp4'
                  ]
              },
              corporate: {
                  title: 'Corporate Events',
                  description: 'Elevate your business events with professional catering solutions designed for corporate excellence.',
                  longDescription: 'Our corporate catering services are tailored to meet the high standards of business events. From breakfast meetings to large-scale conferences, we deliver exceptional cuisine with precise timing and professional presentation. Our team understands the importance of making the right impression in business settings.',
                  features: [
                      {
                          title: 'Breakfast & Lunch Packages',
                          description: 'Fresh, energizing meals perfect for business meetings and conferences, with flexible scheduling options.'
                      },
                      {
                          title: 'Conference Catering',
                          description: 'Full-service catering solutions for conferences, including breaks, refreshments, and multi-day packages.'
                      },
                      {
                          title: 'Corporate Party Planning',
                          description: 'Complete event planning for company celebrations, holiday parties, and team-building events.'
                      },
                      {
                          title: 'Brand-Aligned Presentations',
                          description: 'Custom food presentations that reflect your company\'s brand and professional image.'
                      },
                      {
                          title: 'Time-Sensitive Delivery',
                          description: 'Punctual delivery and setup to ensure your events run according to schedule.'
                      },
                      {
                          title: 'Executive Dining Options',
                          description: 'Premium catering options suitable for board meetings and executive gatherings.'
                      }
                  ],
                  packages: [
                      {
                          name: 'Essential Corporate Package',
                          features: [
                              'Breakfast or lunch buffet',
                              'Coffee and tea service',
                              'Professional staff',
                              'Delivery and setup'
                          ]
                      },
                      {
                          name: 'Executive Corporate Package',
                          features: [
                              'Hot breakfast or plated lunch',
                              'Premium beverage service',
                              'Mid-morning and afternoon breaks',
                              'Custom menu planning',
                              'Full-service staff',
                              'Complete event coordination'
                          ]
                      }
                  ],
                  image: '/images/services/corporate.jpg',
                  gallery: [
                      '/images/gallery/corporate-1.jpg',
                      '/images/gallery/corporate-2.jpg',
                      '/images/gallery/corporate-3.jpg'
                  ]
              },
              private: {
                  title: 'Private Events',
                  description: 'Create lasting memories with exceptional catering for your private celebrations and gatherings.',
                  longDescription: 'Make your private celebrations truly special with our personalized catering services. Whether it\'s an intimate family gathering or a grand celebration, we bring creativity and culinary excellence to every event. Our team works closely with you to create a menu and experience that reflects your personal style.',
                  features: [
                      {
                          title: 'Birthday Celebrations',
                          description: 'Custom menus and themes for birthday parties of all sizes, from intimate gatherings to milestone celebrations.'
                      },
                      {
                          title: 'Anniversary Parties',
                          description: 'Special menus and service packages to commemorate your important relationship milestones.'
                      },
                      {
                          title: 'Family Reunions',
                          description: 'Large-scale catering solutions perfect for bringing families together over great food.'
                      },
                      {
                          title: 'Holiday Gatherings',
                          description: 'Seasonal menus and festive presentations for special holiday celebrations.'
                      },
                      {
                          title: 'Custom Theme Planning',
                          description: 'Themed menu and decor coordination to match your event\'s unique style.'
                      }
                  ],
                  {{-- packages: [
                      {
                          name: 'Intimate Gathering Package',
                          price: 'Starting at $55 per person',
                          features: [
                              'Customized menu selection',
                              'Passed hors d\'oeuvres',
                              'Buffet or family-style service',
                              'Basic bar setup',
                              'Event staff'
                          ]
                      },
                      {
                          name: 'Celebration Package',
                          price: 'Starting at $95 per person',
                          features: [
                              'Extended menu options',
                              'Premium bar service',
                              'Custom food stations',
                              'Decorative food displays',
                              'Full-service staff',
                              'Event coordination'
                          ]
                      }
                  ], --}}
                  image: '/images/services/private.jpg',
                  gallery: [
                      '/images/gallery/private-1.jpg',
                      '/images/gallery/private-2.jpg',
                      '/images/gallery/private-3.jpg'
                  ]
              }
          }
      }"
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ ucfirst($service) }} Services - {{ config('app.name', 'Luxury Catering') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600|playfair-display:400,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @include('components.landing.styles')
    </head>
    <body class="font-sans antialiased bg-white dark:bg-gray-900">
        <!-- Back Button -->
        <div class="fixed top-0 left-0 right-0 z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-100 dark:border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <a href="/#services"
                       class="group flex items-center text-gray-600 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors"
                       @click="document.querySelector('[data-tab={{ $service }}]')?.click()">
                        <svg class="w-5 h-5 mr-2 transform transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Back to Services
                    </a>
                    <div class="flex items-center">
                        <x-dark-mode-toggle />
                    </div>
                </div>
            </div>
        </div>

        <!-- Hero Section -->
        <section class="relative pt-32 pb-24 overflow-hidden">
            <div class="absolute inset-0">
                <img :src="serviceData[service].image"
                     :alt="serviceData[service].title"
                     class="w-full h-full object-cover"
                     onerror="this.src='https://images.unsplash.com/photo-1555244162-803834f70033?fit=crop&w=1920&h=600'">
                <div class="absolute inset-0 bg-gradient-to-r from-gray-900/90 to-gray-900/50"></div>
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-playfair font-bold text-white" x-text="serviceData[service].title"></h1>
                    <p class="mt-6 text-xl text-gray-300" x-text="serviceData[service].description"></p>
                    <div class="mt-8">
                        <a href="#contact"
                           class="inline-flex items-center px-6 py-3 text-lg font-medium text-white bg-primary-600 rounded-lg hover:bg-primary-700 transition-colors">
                            Get a Quote
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Overview Section -->
        <section class="py-16 bg-gray-50 dark:bg-gray-800/50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="prose prose-lg max-w-none">
                    <p class="text-xl text-gray-700 dark:text-gray-300" x-text="serviceData[service].longDescription"></p>
                </div>
            </div>
        </section>

        <!-- Features Grid -->
        <section class="py-24 bg-white dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-playfair font-bold text-center mb-12 text-gray-900 dark:text-white">Service Features</h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <template x-for="feature in serviceData[service].features">
                        <div class="p-6 bg-gray-50 dark:bg-gray-800 rounded-xl">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3" x-text="feature.title"></h3>
                            <p class="text-gray-600 dark:text-gray-300" x-text="feature.description"></p>
                        </div>
                    </template>
                </div>
            </div>
        </section>

        <!-- Packages Section -->
        <section class="py-24 bg-gradient-to-b from-gray-50 to-white dark:from-gray-800/50 dark:to-gray-900"
                 x-data="{ activePackage: null }"
                 x-intersect="$el.classList.add('fade-in-up')">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16 reveal-text">
                    <h2 class="text-4xl font-playfair font-bold text-gray-900 dark:text-white mb-4">Our Packages</h2>
                    <div class="w-24 h-1 bg-primary-600 mx-auto rounded-full"></div>
                </div>

                <!-- Check if packages exist -->
                <template x-if="serviceData[service].packages && serviceData[service].packages.length > 0">
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8"
                         x-intersect="$el.classList.add('fade-in-stagger')">
                        <template x-for="(package, index) in serviceData[service].packages" :key="index">
                            <div class="relative group"
                                 @mouseenter="activePackage = index"
                                 @mouseleave="activePackage = null"
                                 :class="{'scale-105 z-10': activePackage === index}"
                                 style="transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1)">
                                <!-- Package Card -->
                                <div class="bg-white dark:bg-gray-900 rounded-2xl shadow-lg hover:shadow-2xl p-8 transform transition-all duration-500
                                          border-2 border-transparent hover:border-primary-500 relative overflow-hidden">
                                    <!-- Animated Background Pattern -->
                                    <div class="absolute inset-0 opacity-0 group-hover:opacity-10 transition-opacity duration-500">
                                        <div class="absolute inset-0 bg-gradient-to-br from-primary-500 via-transparent to-primary-600 animate-gradient"></div>
                                    </div>

                                    <!-- Content -->
                                    <div class="relative z-10">
                                        <div class="flex items-center justify-between mb-6">
                                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white slide-up" x-text="package.name"></h3>
                                            <span class="px-4 py-2 bg-primary-50 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400 rounded-full text-sm font-medium">
                                                Popular
                                            </span>
                                        </div>

                                        <ul class="space-y-4 mb-8">
                                            <template x-for="(feature, featureIndex) in package.features" :key="featureIndex">
                                                <li class="flex items-center text-gray-700 dark:text-gray-300 slide-up"
                                                    :style="{ 'animation-delay': `${featureIndex * 100}ms` }">
                                                    <span class="flex-shrink-0 w-6 h-6 flex items-center justify-center rounded-full bg-primary-100 dark:bg-primary-900 text-primary-600 dark:text-primary-400 mr-3">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                        </svg>
                                                    </span>
                                                    <span x-text="feature" class="text-base"></span>
                                                </li>
                                            </template>
                                        </ul>

                                        <!-- Action Buttons -->
                                        <div class="space-y-3 mt-8 slide-up-delay">
                                            <a href="#contact"
                                               class="flex items-center justify-center w-full px-6 py-3 text-lg font-medium text-white bg-primary-600 rounded-xl
                                                      hover:bg-primary-700 transform hover:scale-105 transition-all duration-300
                                                      focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                                Book Now
                                                <svg class="w-5 h-5 ml-2 -mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                                </svg>
                                            </a>
                                            <button class="text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300
                                                         text-sm font-medium transition-colors duration-300 flex items-center justify-center w-full">
                                                Learn More
                                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>

                <!-- Enhanced Coming Soon State -->
                <template x-if="!serviceData[service].packages || serviceData[service].packages.length === 0">
                    <div class="relative overflow-hidden rounded-3xl shadow-2xl"
                         x-intersect="$el.classList.add('fade-in-up')">
                        <!-- Animated Background -->
                        <div class="absolute inset-0">
                            <div class="absolute inset-0 bg-gradient-to-r from-primary-500/20 to-primary-600/20 animate-gradient-slow"></div>
                            <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
                        </div>

                        <!-- Content -->
                        <div class="relative bg-white/90 dark:bg-gray-900/90 backdrop-blur-sm p-12 text-center">
                            <div class="mb-8 animate-float">
                                <div class="relative">
                                    <svg class="w-24 h-24 mx-auto text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                                              class="animate-pulse-slow"/>
                                    </svg>
                                    <div class="absolute inset-0 bg-primary-500/20 blur-2xl rounded-full animate-blob"></div>
                                </div>
                            </div>

                            <h3 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6 reveal-text">
                                Exciting Packages Coming Soon
                            </h3>

                            <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 max-w-2xl mx-auto slide-up">
                                We're crafting exceptional experiences just for you. Join our waitlist to be the first to know when our packages launch.
                            </p>

                            <!-- Animated Progress Indicator -->
                            <div class="relative h-2 bg-gray-200 dark:bg-gray-700 rounded-full max-w-md mx-auto mb-12 overflow-hidden">
                                <div class="absolute inset-0 bg-primary-600 rounded-full animate-progress-infinite"></div>
                                <div class="absolute inset-0 bg-primary-400 rounded-full animate-progress-infinite-delayed"></div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center slide-up-delay">
                                <a href="#contact"
                                   class="group inline-flex items-center justify-center px-8 py-4 text-lg font-medium text-white bg-primary-600 rounded-xl
                                          hover:bg-primary-700 transform hover:scale-105 transition-all duration-300
                                          focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                    <svg class="w-6 h-6 mr-2 transform group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                    </svg>
                                    Contact Us
                                </a>
                                <button onclick="window.history.back()"
                                        class="group inline-flex items-center justify-center px-8 py-4 text-lg font-medium text-primary-600 bg-primary-50
                                               dark:bg-primary-900/20 dark:text-primary-400 rounded-xl hover:bg-primary-100 dark:hover:bg-primary-900/30
                                               transform hover:scale-105 transition-all duration-300">
                                    <svg class="w-6 h-6 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                    </svg>
                                    Go Back
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </section>

        <!-- Gallery Section -->
        <section class="py-24 bg-white dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-playfair font-bold text-center mb-12 text-gray-900 dark:text-white">Gallery</h2>

                <!-- Masonry Gallery Container -->
                <div x-data="{
                    selectedMedia: null,
                    isModalOpen: false,
                    currentIndex: 0,

                    next() {
                        this.currentIndex = (this.currentIndex + 1) % serviceData[service].gallery.length;
                        this.selectedMedia = serviceData[service].gallery[this.currentIndex];
                    },

                    previous() {
                        this.currentIndex = (this.currentIndex - 1 + serviceData[service].gallery.length) % serviceData[service].gallery.length;
                        this.selectedMedia = serviceData[service].gallery[this.currentIndex];
                    }
                }" class="relative">
                    <!-- Masonry Grid -->
                    <div class="columns-1 sm:columns-2 lg:columns-3 gap-4 space-y-4">
                        <template x-for="(media, index) in serviceData[service].gallery" :key="index">
                            <div class="break-inside-avoid" @click="selectedMedia = media; isModalOpen = true; currentIndex = index">
                                <!-- Video Thumbnail -->
                                <template x-if="media.toLowerCase().endsWith('.mp4')">
                                    <div class="relative group cursor-pointer rounded-xl overflow-hidden">
                                        <video class="w-full" :src="media" preload="metadata">
                                            Your browser does not support the video tag.
                                        </video>
                                        <div class="absolute inset-0 bg-black/30 group-hover:bg-black/50 transition-colors flex items-center justify-center">
                                            <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M8 5v14l11-7z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </template>

                                <!-- Image -->
                                <template x-if="!media.toLowerCase().endsWith('.mp4')">
                                    <div class="relative group cursor-pointer rounded-xl overflow-hidden">
                                        <img :src="media" class="w-full h-auto" loading="lazy">
                                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 transition-colors"></div>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>

                    <!-- Modal -->
                    <div x-show="isModalOpen"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-90"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-90"
                         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/90"
                         @click.self="isModalOpen = false">

                        <!-- Navigation Buttons -->
                        <button @click="previous" class="absolute left-4 top-1/2 -translate-y-1/2 p-2 text-white hover:text-primary-400 transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>

                        <button @click="next" class="absolute right-4 top-1/2 -translate-y-1/2 p-2 text-white hover:text-primary-400 transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>

                        <!-- Close Button -->
                        <button @click="isModalOpen = false" class="absolute top-4 right-4 text-white hover:text-primary-400 transition-colors">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>

                        <!-- Media Container -->
                        <div class="max-w-5xl max-h-[80vh] overflow-hidden rounded-xl">
                            <template x-if="selectedMedia?.toLowerCase().endsWith('.mp4')">
                                <video class="w-full h-full" controls :src="selectedMedia">
                                    Your browser does not support the video tag.
                                </video>
                            </template>
                            <template x-if="!selectedMedia?.toLowerCase().endsWith('.mp4')">
                                <img :src="selectedMedia" class="w-full h-full object-contain">
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        @include('components.landing.service-contact')

        <!-- Footer -->
        @include('components.landing.service-footer')
    </body>
</html>
