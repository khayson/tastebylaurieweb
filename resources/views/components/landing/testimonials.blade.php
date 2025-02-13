<section id="testimonials" class="py-24 bg-gray-50 dark:bg-gray-800/50" x-data="{ selectedTestimonial: null }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-base font-semibold text-primary-600 dark:text-primary-400 tracking-wide uppercase">
                Testimonials
            </h2>
            <p class="mt-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                What Our Clients Say
            </p>
            <p class="mt-4 text-lg text-gray-500 dark:text-gray-400">
                Read about the experiences of our valued clients and their memorable events with us.
            </p>
        </div>

        @php
            $featuredTestimonials = \App\Models\Testimonial::where('is_featured', true)
                ->latest()
                ->take(6)
                ->get();
        @endphp

        @if($featuredTestimonials->isNotEmpty())
            <!-- Testimonials Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredTestimonials as $testimonial)
                    <div class="relative bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden transform hover:-translate-y-1 transition-all duration-300">
                        <!-- Decorative Elements -->
                        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary-500 to-primary-600"></div>
                        <div class="absolute top-4 right-4">
                            <svg class="w-8 h-8 text-primary-100 dark:text-primary-900" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                        </div>

                        <div class="p-8">
                            <!-- Client Info -->
                            <div class="flex items-center mb-6">
                                @if($testimonial->client_avatar)
                                    <img src="{{ $testimonial->client_avatar }}"
                                         alt="{{ $testimonial->client_name }}"
                                         class="w-14 h-14 rounded-full object-cover border-2 border-primary-100 dark:border-primary-900">
                                @else
                                    <div class="w-14 h-14 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center border-2 border-primary-200 dark:border-primary-800">
                                        <span class="text-xl font-semibold text-primary-700 dark:text-primary-300">
                                            {{ substr($testimonial->client_name, 0, 2) }}
                                        </span>
                                    </div>
                                @endif
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        {{ $testimonial->client_name }}
                                    </h3>
                                    @if($testimonial->event_type)
                                        <p class="text-sm text-primary-600 dark:text-primary-400">
                                            {{ $testimonial->event_type }}
                                            @if($testimonial->event_date)
                                                <span class="text-gray-400 dark:text-gray-500">
                                                    · {{ $testimonial->event_date->format('M Y') }}
                                                </span>
                                            @endif
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <!-- Testimonial Content -->
                            <div class="relative">
                                <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                                    "{{ \Illuminate\Support\Str::limit($testimonial->message, 200) }}"
                                </p>

                                <!-- Rating Stars -->
                                <div class="flex items-center mt-6">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                        </svg>
                                    @endfor
                                </div>
                            </div>

                            <!-- Add a Read More button -->
                            <div class="absolute bottom-4 right-4">
                                <button @click="selectedTestimonial = {{ $testimonial->toJson() }}"
                                        class="text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 font-medium text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 rounded-lg">
                                    Read More
                                    <span class="sr-only">about {{ $testimonial->client_name }}'s testimonial</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Testimonial Conversation Modal -->
            <template x-teleport="body">
                <div x-show="selectedTestimonial"
                     class="fixed inset-0 z-50 overflow-y-auto"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0">
                    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                        <!-- Background overlay -->
                        <div class="fixed inset-0 bg-gray-500 dark:bg-gray-900 bg-opacity-75 dark:bg-opacity-75 transition-opacity"
                             @click="selectedTestimonial = null"></div>

                        <!-- Modal panel -->
                        <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full"
                             x-show="selectedTestimonial"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                             x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                             x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">

                            <!-- Modal header -->
                            <div class="bg-primary-600 px-4 py-3 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <template x-if="selectedTestimonial?.client_avatar">
                                            <img :src="selectedTestimonial.client_avatar"
                                                 :alt="selectedTestimonial.client_name"
                                                 class="w-10 h-10 rounded-full object-cover border-2 border-white">
                                        </template>
                                        <template x-if="!selectedTestimonial?.client_avatar">
                                            <div class="w-10 h-10 rounded-full bg-primary-400 flex items-center justify-center border-2 border-white">
                                                <span class="text-white text-lg font-semibold"
                                                      x-text="selectedTestimonial?.client_name.substring(0, 2)"></span>
                                            </div>
                                        </template>
                                        <div>
                                            <h3 class="text-lg font-semibold text-white" x-text="selectedTestimonial?.client_name"></h3>
                                            <p class="text-sm text-primary-100" x-text="selectedTestimonial?.event_type"></p>
                                        </div>
                                    </div>
                                    <button @click="selectedTestimonial = null"
                                            class="text-white hover:text-primary-100 focus:outline-none">
                                        <span class="sr-only">Close</span>
                                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Modal body -->
                            <div class="px-4 py-5 sm:p-6"
                                 style="background-color: #f9fafb;
                                        background-image: radial-gradient(#e5e7eb 0.5px, transparent 0.5px);
                                        background-size: 10px 10px;
                                        @media (prefers-color-scheme: dark) {
                                            background-color: #111827;
                                            background-image: radial-gradient(#1f2937 0.5px, transparent 0.5px);
                                        }">
                                <div class="space-y-4">
                                    <!-- Admin Welcome Message -->
                                    <div class="flex justify-end">
                                        <div class="max-w-[80%] bg-primary-100 dark:bg-primary-900 p-4 rounded-lg">
                                            <p class="text-gray-700 dark:text-gray-300">
                                                Thank you for choosing Taste by Laurie! We're delighted to hear about your experience.
                                            </p>
                                            <span class="text-xs text-gray-500 dark:text-gray-400 mt-1 block">
                                                Laurie
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Client Message -->
                                    <div class="flex">
                                        <div class="max-w-[80%] bg-white dark:bg-gray-700 p-4 rounded-lg shadow-sm">
                                            <p class="text-gray-700 dark:text-gray-300" x-text="selectedTestimonial?.message"></p>
                                            <div class="mt-2 flex items-center justify-between">
                                                <div class="flex items-center">
                                                    <template x-for="i in 5" :key="i">
                                                        <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                                        </svg>
                                                    </template>
                                                </div>
                                                <span class="text-xs text-gray-500 dark:text-gray-400"
                                                      x-text="new Date(selectedTestimonial?.created_at).toLocaleDateString()"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Thank You Message -->
                                    <div class="flex justify-end">
                                        <div class="max-w-[80%] bg-primary-100 dark:bg-primary-900 p-4 rounded-lg">
                                            <p class="text-gray-700 dark:text-gray-300">
                                                We truly appreciate your feedback! It means a lot to us that you had such a wonderful experience. 🙏
                                            </p>
                                            <span class="text-xs text-gray-500 dark:text-gray-400 mt-1 block">
                                                Laurie
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <!-- Call to Action -->
            <div class="mt-16 text-center">
                <p class="text-base text-gray-500 dark:text-gray-400">
                    Would you like to share your experience with us?
                </p>
                <a href="#contact"
                   class="mt-4 inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors duration-200">
                    Contact Us
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </a>
            </div>
        @endif
    </div>
</section>
