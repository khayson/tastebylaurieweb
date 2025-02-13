<x-show-layout>
    <!-- Back Arrow -->
    <a href="{{ route('welcome') }}#events"
       class="fixed top-8 left-8 z-10 flex items-center gap-2 px-4 py-2 bg-white/90 dark:bg-gray-800/90 rounded-full shadow-lg backdrop-blur-sm hover:bg-white dark:hover:bg-gray-800 transition-all group">
        <svg class="w-5 h-5 text-gray-700 dark:text-gray-300 transform group-hover:-translate-x-1 transition-transform"
             fill="none"
             stroke="currentColor"
             viewBox="0 0 24 24">
            <path stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
        </svg>
        <span class="text-gray-700 dark:text-gray-300 font-medium">Back to Events</span>
    </a>

    <div class="relative bg-white dark:bg-gray-900">
        <!-- Hero Section with Cover Image -->
        <div class="relative h-[60vh] overflow-hidden">
            <img src="{{ $event->cover_image }}"
                 alt="{{ $event->title }}"
                 class="absolute inset-0 w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-transparent">
                <div class="absolute bottom-0 left-0 right-0 p-8 max-w-7xl mx-auto">
                    <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $event->title }}</h1>
                    <p class="text-lg text-white/90 mb-6 max-w-3xl">{{ $event->description }}</p>
                    <div class="flex items-center space-x-4 text-white/90">
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            {{ $event->location }}
                        </span>
                        <span>•</span>
                        <span class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ $event->event_date->format('F d, Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Event Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            {{-- <!-- Description -->
            <div class="prose dark:prose-invert max-w-none mb-16">
                <p class="text-lg text-gray-600 dark:text-gray-400">{{ $event->description }}</p>
            </div> --}}

            <!-- Gallery -->
            <div x-data="{
                selectedMedia: null,
                isLightboxOpen: false,
                currentIndex: 0,
                gallery: {{ json_encode($event->gallery ?? []) }},

                next() {
                    this.currentIndex = (this.currentIndex + 1) % this.gallery.length;
                    this.selectedMedia = this.gallery[this.currentIndex];
                },

                previous() {
                    this.currentIndex = (this.currentIndex - 1 + this.gallery.length) % this.gallery.length;
                    this.selectedMedia = this.gallery[this.currentIndex];
                },

                openLightbox(media, index) {
                    this.selectedMedia = media;
                    this.currentIndex = index;
                    this.isLightboxOpen = true;
                }
            }">
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-8">Event Gallery</h2>

                <!-- Gallery Grid -->
                <div class="columns-1 sm:columns-2 lg:columns-3 xl:columns-4 gap-4 space-y-4">
                    @forelse($event->gallery ?? [] as $index => $media)
                        <div class="break-inside-avoid">
                            @if(isset($media['type']) && $media['type'] === 'image')
                                <div class="relative group cursor-pointer rounded-lg overflow-hidden"
                                     @click="openLightbox({{ json_encode($media) }}, {{ $index }})">
                                    <img src="{{ $media['url'] }}"
                                         alt="{{ $media['caption'] ?? '' }}"
                                         class="w-full h-auto rounded-lg transform group-hover:scale-105 transition-transform duration-300">
                                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                                        </svg>
                                    </div>
                                </div>
                            @elseif(isset($media['type']) && $media['type'] === 'video')
                                <div class="relative rounded-lg overflow-hidden">
                                    <video controls class="w-full h-auto rounded-lg">
                                        <source src="{{ $media['url'] }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <div class="absolute top-2 right-2 bg-black/50 rounded-full p-2">
                                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                        </svg>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @empty
                        <p class="text-gray-500 dark:text-gray-400 text-center col-span-full">No gallery items available.</p>
                    @endforelse
                </div>

                <!-- Lightbox -->
                <template x-if="isLightboxOpen">
                    <div class="fixed inset-0 z-50 bg-black/95 flex items-center justify-center"
                         @click.self="isLightboxOpen = false"
                         @keydown.escape.window="isLightboxOpen = false"
                         @keydown.arrow-left.window="previous"
                         @keydown.arrow-right.window="next">

                        <!-- Close Button -->
                        <button @click="isLightboxOpen = false"
                                class="absolute top-4 right-4 text-white/80 hover:text-white">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>

                        <!-- Navigation Buttons -->
                        <button @click="previous"
                                class="absolute left-4 top-1/2 -translate-y-1/2 text-white/80 hover:text-white">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>

                        <button @click="next"
                                class="absolute right-4 top-1/2 -translate-y-1/2 text-white/80 hover:text-white">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>

                        <!-- Media Content -->
                        <div class="max-h-[90vh] max-w-[90vw]">
                            <template x-if="selectedMedia.type === 'image'">
                                <img :src="selectedMedia.url"
                                     :alt="selectedMedia.caption"
                                     class="max-h-[90vh] max-w-[90vw] object-contain">
                            </template>
                            <template x-if="selectedMedia.type === 'video'">
                                <video :src="selectedMedia.url"
                                       controls
                                       class="max-h-[90vh] max-w-[90vw]">
                                </video>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</x-show-layout>
