@props(['pastEvents'])

<section id="events" class="relative py-24 bg-white dark:bg-gray-900 overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,_var(--tw-gradient-stops))] from-primary-100/20 via-transparent to-transparent dark:from-primary-900/20"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-20">
            <span class="text-primary-600 dark:text-primary-400 font-medium tracking-wider uppercase">Our Events</span>
            <h2 class="mt-3 text-4xl sm:text-5xl font-playfair font-bold text-gray-900 dark:text-white">
                Memorable Moments
            </h2>
            <div class="mt-4 w-20 h-1.5 bg-primary-600 dark:bg-primary-400 rounded-full mx-auto"></div>
            <p class="mt-4 text-gray-600 dark:text-gray-400">Explore our gallery of exquisite events and celebrations</p>
        </div>

        <!-- Event Grid -->
        <div class="columns-1 md:columns-2 lg:columns-3 gap-8 space-y-8" x-data="{ selectedEvent: null }">
            @foreach($pastEvents as $event)
                <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg overflow-hidden break-inside-avoid">
                    <!-- Event Image -->
                    <div class="relative aspect-[4/3] overflow-hidden">
                        <img src="{{ $event->cover_image }}"
                             alt="{{ $event->title }}"
                             class="object-cover w-full h-full transform group-hover:scale-105 transition-transform duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-4 left-4 right-4">
                                <p class="text-white text-sm mb-1">{{ $event->location }}</p>
                                <p class="text-white/80 text-xs">{{ $event->event_date->format('M d, Y') }}</p>
                            </div>
                        </div>
                        <a href="{{ route('events.show', $event) }}"
                           class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 px-4 py-2 bg-white/90 dark:bg-gray-800/90 text-gray-900 dark:text-white rounded-full text-sm font-medium hover:bg-white dark:hover:bg-gray-800 transition-colors opacity-0 group-hover:opacity-100">
                            View Event
                        </a>
                    </div>

                    <!-- Event Details -->
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ $event->title }}</h3>
                        <p class="text-gray-600 dark:text-gray-400 text-sm line-clamp-2">{{ $event->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Event Gallery Modal -->
        <template x-if="selectedEvent">
            <div class="fixed inset-0 z-50 overflow-y-auto" x-show="selectedEvent"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0">
                <!-- Modal Content -->
                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-900 opacity-95"></div>
                    </div>

                    <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-7xl sm:w-full">
                        <!-- Event Header -->
                        <div class="relative h-96">
                            <img :src="selectedEvent.cover_image"
                                 :alt="selectedEvent.title"
                                 class="absolute inset-0 w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent">
                                <div class="absolute bottom-8 left-8 right-8">
                                    <h3 class="text-3xl font-bold text-white" x-text="selectedEvent.title"></h3>
                                    <div class="mt-4 flex items-center space-x-4 text-white/90">
                                        <span x-text="selectedEvent.location"></span>
                                        <span>•</span>
                                        <span x-text="new Date(selectedEvent.event_date).toLocaleDateString('en-US', {month: 'long', day: 'numeric', year: 'numeric'})"></span>
                                    </div>
                                </div>
                            </div>
                            <button @click="selectedEvent = null"
                                    class="absolute top-4 right-4 text-white/80 hover:text-white">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                            </button>
                        </div>

                        <!-- Gallery Grid -->
                        <div class="p-8">
                            <div class="columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
                                <template x-if="selectedEvent && selectedEvent.gallery">
                                    <template x-for="media in selectedEvent.gallery" :key="media.id">
                                        <div class="relative break-inside-avoid rounded-lg overflow-hidden">
                                            <template x-if="media.type === 'image'">
                                                <img :src="media.url"
                                                     :alt="media.caption"
                                                     class="w-full h-auto"
                                                     @click="openLightbox(media)">
                                            </template>
                                            <template x-if="media.type === 'video'">
                                                <div class="relative aspect-video">
                                                    <video :src="media.url"
                                                           class="w-full h-full object-cover"
                                                           controls>
                                                    </video>
                                                    <div class="absolute top-2 right-2 bg-black/50 rounded-full p-2">
                                                        <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                  d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </template>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
</section>
