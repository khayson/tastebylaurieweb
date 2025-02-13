<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Testimonials Overview -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <div class="flex items-center gap-2">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    Featured Testimonials
                                </h3>
                                <span class="bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-200 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                    {{ \App\Models\Testimonial::where('is_featured', true)->count() }}
                                </span>
                            </div>
                            <div class="flex items-center gap-3">
                                <a href="{{ route('admin.testimonials.index') }}"
                                   class="text-sm text-primary-600 dark:text-primary-400 hover:underline">
                                    View All
                                </a>
                                <button @click="$dispatch('open-modal', 'dashboard-create-testimonial')"
                                        class="inline-flex items-center px-3 py-1.5 text-sm bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 4v16m8-8H4"/>
                                    </svg>
                                    New
                                </button>
                            </div>
                        </div>

                        @php
                            $featuredTestimonials = \App\Models\Testimonial::where('is_featured', true)
                                ->latest()
                                ->take(3)
                                ->get();
                        @endphp

                        @if($featuredTestimonials->count() > 0)
                            <div class="space-y-4">
                                @foreach($featuredTestimonials as $testimonial)
                                    <div x-data="{ expanded: false }"
                                         class="group relative bg-gray-50 dark:bg-gray-900 rounded-lg p-4 hover:bg-gray-100 dark:hover:bg-gray-800/70 transition-colors">
                                        <div class="flex items-start gap-4 max-w-full">
                                            <!-- Avatar -->
                                            <div class="flex-shrink-0">
                                                @if($testimonial->client_avatar)
                                                    <img src="{{ $testimonial->client_avatar }}"
                                                         alt="{{ $testimonial->client_name }}"
                                                         class="w-12 h-12 rounded-full object-cover">
                                                @else
                                                    <div class="w-12 h-12 rounded-full bg-primary-100 dark:bg-primary-900 flex items-center justify-center">
                                                        <span class="text-primary-700 dark:text-primary-300 text-lg font-medium">
                                                            {{ substr($testimonial->client_name, 0, 2) }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>

                                            <!-- Content -->
                                            <div class="flex-1 min-w-0 overflow-hidden">
                                                <div class="flex items-center justify-between mb-1">
                                                    <h4 class="text-base font-medium text-gray-900 dark:text-gray-100 truncate max-w-[200px]"
                                                        title="{{ $testimonial->client_name }}">
                                                        {{ $testimonial->client_name }}
                                                    </h4>
                                                    <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400 flex-shrink-0">
                                                        @if($testimonial->is_featured)
                                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-200">
                                                                Featured
                                                            </span>
                                                        @endif
                                                        <time datetime="{{ $testimonial->created_at->format('Y-m-d') }}"
                                                              title="{{ $testimonial->created_at->format('F j, Y') }}"
                                                              class="flex-shrink-0">
                                                            {{ $testimonial->created_at->diffForHumans() }}
                                                        </time>
                                                    </div>
                                                </div>

                                                @if($testimonial->event_type)
                                                    <p class="text-sm text-primary-600 dark:text-primary-400 mb-2 truncate"
                                                       title="{{ $testimonial->event_type }}{{ $testimonial->event_date ? ' - ' . $testimonial->event_date->format('M d, Y') : '' }}">
                                                        {{ $testimonial->event_type }}
                                                        @if($testimonial->event_date)
                                                            · {{ $testimonial->event_date->format('M d, Y') }}
                                                        @endif
                                                    </p>
                                                @endif

                                                <div class="relative">
                                                    <p class="text-gray-600 dark:text-gray-300"
                                                       :class="{ 'line-clamp-2': !expanded }">
                                                        {{ $testimonial->message }}
                                                    </p>
                                                    @if(strlen($testimonial->message) > 150)
                                                        <button @click="expanded = !expanded"
                                                                class="text-primary-600 dark:text-primary-400 text-sm mt-1 hover:underline focus:outline-none">
                                                            <span x-text="expanded ? 'Show less' : 'Read more'"></span>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Quick Actions -->
                                        <div class="absolute top-4 right-4 flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                            <button @click="$dispatch('open-modal', 'edit-testimonial-{{ $testimonial->id }}')"
                                                    class="p-1 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300"
                                                    title="Edit">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                            </button>
                                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                                                  method="POST"
                                                  class="inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this testimonial?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="p-1 text-gray-400 hover:text-red-600 dark:hover:text-red-400"
                                                        title="Delete">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-12">
                                <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">No featured testimonials</h3>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Get started by featuring some testimonials.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Past Events -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Past Events</h2>
                            <button onclick="openPastEventModal()"
                                    class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">
                                Add Past Event
                            </button>
                        </div>

                        @if (session('success'))
                            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <!-- Table headers -->
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Cover Image</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Event Details</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Location</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Date</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @forelse($pastEvents as $event)
                                        <!-- Past event rows -->
                                        @include('admin.past-events._row', ['event' => $event])
                                    @empty
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                                No past events found
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if($pastEvents->hasPages())
                            <div class="mt-4">
                                {{ $pastEvents->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Past Event Modal -->
    <div id="pastEventModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 dark:bg-gray-900 bg-opacity-75 transition-opacity"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>

            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="pastEventForm" method="POST" enctype="multipart/form-data" onsubmit="handleSubmit(event)">
                    @csrf
                    <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="space-y-4">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                                <input type="text" name="title" id="title" required
                                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                            </div>

                            <!-- Location -->
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Location</label>
                                <input type="text" name="location" id="location" required
                                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                            </div>

                            <!-- Event Date -->
                            <div>
                                <label for="event_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Event Date</label>
                                <input type="date" name="event_date" id="event_date" required
                                       class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                            </div>

                            <!-- Description -->
                            <div>
                                <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                                <textarea name="description" id="description" rows="3" required
                                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500"></textarea>
                            </div>

                            <!-- File Input Section -->
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Cover Image</label>
                                    <div id="coverPreview" class="mt-2 hidden relative aspect-video rounded-lg overflow-hidden">
                                        <img src="" alt="Cover preview" class="w-full h-full object-cover">
                                        <button onclick="removeCoverPreview()" type="button"
                                                class="absolute top-2 right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <input type="file" name="cover_image" id="cover_image" accept="image/*"
                                           class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400
                                                  file:mr-4 file:py-2 file:px-4
                                                  file:rounded-md file:border-0
                                                  file:text-sm file:font-semibold
                                                  file:bg-primary-50 file:text-primary-700
                                                  hover:file:bg-primary-100
                                                  dark:file:bg-primary-900 dark:file:text-primary-400"
                                           onchange="previewImage(this, 'coverPreview')">
                                </div>

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Gallery</label>
                                    <div id="galleryPreview" class="mt-2 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4"></div>
                                    <input type="file" name="gallery[]" id="gallery" multiple
                                           accept="image/*,video/mp4"
                                           class="mt-1 block w-full text-sm text-gray-500 dark:text-gray-400
                                                  file:mr-4 file:py-2 file:px-4
                                                  file:rounded-md file:border-0
                                                  file:text-sm file:font-semibold
                                                  file:bg-primary-50 file:text-primary-700
                                                  hover:file:bg-primary-100
                                                  dark:file:bg-primary-900 dark:file:text-primary-400"
                                           onchange="previewGallery(this)">
                                    <p class="mt-1 text-sm text-gray-500">You can upload multiple images and videos (MP4)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="submit"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary-600 text-base font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Save
                        </button>
                        <button type="button" onclick="closePastEventModal()"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div id="viewPastEventModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 dark:bg-gray-900 bg-opacity-75 transition-opacity"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>

            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                <!-- Cover Image Section with Overlay Content -->
                <div class="relative h-[400px]">
                    <div id="viewCoverImage" class="absolute inset-0">
                        <!-- Placeholder will be replaced by JavaScript -->
                        <div class="absolute inset-0 bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                            <span class="text-gray-400 dark:text-gray-500">No cover image</span>
                        </div>
                    </div>

                    <!-- Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-black/30"></div>

                    <!-- Close Button -->
                    <button type="button" onclick="closeViewModal()"
                            class="absolute top-4 right-4 text-white/80 hover:text-white focus:outline-none z-10">
                        <span class="sr-only">Close</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    <!-- Content Overlay -->
                    <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                        <h3 id="viewTitle" class="text-3xl font-bold mb-4"></h3>

                        <div class="flex items-center space-x-6 text-sm mb-4">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span id="viewLocation" class="text-white/90"></span>
                            </div>
                            <div class="flex items-center">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span id="viewDate" class="text-white/90"></span>
                            </div>
                        </div>

                        <p id="viewDescription" class="text-white/80 text-sm line-clamp-3"></p>
                    </div>
                </div>

                <!-- Gallery Section -->
                <div class="p-6 bg-white dark:bg-gray-800">
                    <h4 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Gallery</h4>
                    <div id="viewGallery" class="columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
                        <!-- Gallery items will be inserted here by JavaScript -->
                    </div>
                </div>

                <!-- Footer -->
                <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 flex justify-end space-x-3">
                    {{-- <button type="button" onclick="openPastEventModal(currentViewingEventId)"
                            class="inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-primary-600 text-base font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:text-sm">
                        Edit Event
                    </button> --}}
                    <button type="button" onclick="closeViewModal()"
                            class="inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:text-sm">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <x-modal name="dashboard-create-testimonial" :show="false" maxWidth="md">
        <div class="bg-white dark:bg-gray-800">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    New Client Conversation
                </h2>
            </div>

            <div class="bg-[url('/images/chat-bg.png')] dark:bg-[url('/images/chat-bg-dark.png')]">
                <form action="{{ route('admin.testimonials.store') }}"
                      method="POST"
                      enctype="multipart/form-data"
                      class="p-6"
                      x-data="{
                          clientName: '',
                          eventType: '',
                          message: '',
                          isEdit: false,
                          previewImage: null
                      }">
                    @csrf
                    @include('admin.testimonials._form')
                </form>
            </div>
        </div>
    </x-modal>

    <!-- Edit Modals -->
    @foreach($featuredTestimonials as $testimonial)
        <x-modal name="edit-testimonial-{{ $testimonial->id }}" :show="false" maxWidth="md">
            <div class="bg-white dark:bg-gray-800">
                <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        Edit Conversation with {{ $testimonial->client_name }}
                    </h2>
                </div>

                <div class="bg-[url('/images/chat-bg.png')] dark:bg-[url('/images/chat-bg-dark.png')]">
                    <form action="{{ route('admin.testimonials.update', $testimonial) }}"
                          method="POST"
                          enctype="multipart/form-data"
                          class="p-6"
                          x-data="{
                              clientName: '{{ addslashes($testimonial->client_name) }}',
                              eventType: '{{ addslashes($testimonial->event_type) }}',
                              message: '{{ addslashes($testimonial->message) }}',
                              isEdit: true
                          }">
                        @csrf
                        @method('PUT')
                        @include('admin.testimonials._form', ['testimonial' => $testimonial])
                    </form>
                </div>
            </div>
        </x-modal>
    @endforeach

    <script>
    // Add this variable to track currently viewing event
    let currentViewingEventId = null;

    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        const img = preview.querySelector('img');

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                img.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeCoverPreview() {
        const preview = document.getElementById('coverPreview');
        const input = document.getElementById('cover_image');
        preview.classList.add('hidden');
        preview.querySelector('img').src = '';
        input.value = '';
    }

    function previewGallery(input) {
        const preview = document.getElementById('galleryPreview');
        preview.innerHTML = '';

        if (input.files) {
            Array.from(input.files).forEach(file => {
                const div = document.createElement('div');
                div.className = 'relative group aspect-video rounded-lg overflow-hidden';

                const reader = new FileReader();
                reader.onload = function(e) {
                    if (file.type.startsWith('image/')) {
                        div.innerHTML = `
                            <img src="${e.target.result}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="text-white text-xs px-2 py-1 rounded bg-black/50">${file.name}</span>
                            </div>
                        `;
                    } else if (file.type.startsWith('video/')) {
                        div.innerHTML = `
                            <video src="${e.target.result}" class="w-full h-full object-cover"></video>
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <span class="text-white text-xs px-2 py-1 rounded bg-black/50">
                                    <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    ${file.name}
                                </span>
                            </div>
                        `;
                    }
                    preview.appendChild(div);
                }
                reader.readAsDataURL(file);
            });
        }
    }

    function handleSubmit(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);

        // Show loading state
        const submitButton = form.querySelector('button[type="submit"]');
        const originalText = submitButton.innerText;
        submitButton.disabled = true;
        submitButton.innerText = 'Saving...';

        fetch(form.action, {
            method: form.method,
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                closePastEventModal();
                window.location.reload();
            } else {
                // Handle error
                alert(data.message || 'An error occurred');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while saving');
        })
        .finally(() => {
            submitButton.disabled = false;
            submitButton.innerText = originalText;
        });
    }

    function openPastEventModal(eventId = null) {
        const modal = document.getElementById('pastEventModal');
        const form = document.getElementById('pastEventForm');
        const preview = document.getElementById('coverPreview');
        const galleryPreview = document.getElementById('galleryPreview');

        // Reset form and previews
        form.reset();
        preview.classList.add('hidden');
        galleryPreview.innerHTML = '';

        // Remove any existing method input
        const existingMethodInput = form.querySelector('input[name="_method"]');
        if (existingMethodInput) {
            existingMethodInput.remove();
        }

        if (eventId) {
            form.action = `/admin/past-events/${eventId}`;
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'PUT';
            form.appendChild(methodInput);

            fetch(`/admin/past-events/${eventId}/edit`)
                .then(response => response.json())
                .then(data => {
                    form.elements.title.value = data.title;
                    form.elements.location.value = data.location;
                    form.elements.description.value = data.description;
                    form.elements.event_date.value = data.event_date;

                    if (data.cover_image) {
                        const img = preview.querySelector('img');
                        img.src = data.cover_image;
                        preview.classList.remove('hidden');
                    }

                    if (data.gallery && data.gallery.length > 0) {
                        data.gallery.forEach(item => {
                            const div = document.createElement('div');
                            if (item.type === 'image') {
                                div.innerHTML = `<img src="${item.url}" class="h-24 w-full object-cover rounded-lg">`;
                            } else if (item.type === 'video') {
                                div.innerHTML = `<video src="${item.url}" class="h-24 w-full object-cover rounded-lg"></video>`;
                            }
                            galleryPreview.appendChild(div);
                        });
                    }
                });
        } else {
            form.action = '/admin/past-events';
        }

        modal.classList.remove('hidden');
    }

    function closePastEventModal() {
        document.getElementById('pastEventModal').classList.add('hidden');
    }

    function deletePastEvent(eventId) {
        if (confirm('Are you sure you want to delete this past event?')) {
            fetch(`/admin/past-events/${eventId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.reload();
                }
            });
        }
    }

    function viewPastEvent(eventId) {
        currentViewingEventId = eventId;
        fetch(`/admin/past-events/${eventId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('viewTitle').textContent = data.title;
                document.getElementById('viewLocation').textContent = data.location;
                document.getElementById('viewDate').textContent = new Date(data.event_date).toLocaleDateString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                });
                document.getElementById('viewDescription').textContent = data.description;

                // Handle cover image
                const coverImageDiv = document.getElementById('viewCoverImage');
                if (data.cover_image) {
                    coverImageDiv.innerHTML = `
                        <img src="${data.cover_image}"
                             alt="${data.title}"
                             class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    `;
                } else {
                    coverImageDiv.innerHTML = `
                        <div class="absolute inset-0 bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                            <span class="text-gray-400 dark:text-gray-500">No cover image</span>
                        </div>
                    `;
                }

                // Handle gallery
                const galleryDiv = document.getElementById('viewGallery');
                galleryDiv.innerHTML = '';
                if (data.gallery && data.gallery.length > 0) {
                    populateGallery(data.gallery);
                } else {
                    galleryDiv.innerHTML = `
                        <div class="col-span-full text-center py-8 text-gray-500 dark:text-gray-400">
                            No gallery items available
                        </div>
                    `;
                }

                document.getElementById('viewPastEventModal').classList.remove('hidden');
            });
    }

    function populateGallery(gallery) {
        const galleryContainer = document.getElementById('viewGallery');
        galleryContainer.innerHTML = '';

        if (!gallery || gallery.length === 0) {
            galleryContainer.innerHTML = `
                <div class="text-gray-500 dark:text-gray-400 text-center py-8">
                    No gallery items available
                </div>
            `;
            return;
        }

        gallery.forEach(item => {
            const div = document.createElement('div');
            div.className = 'break-inside-avoid relative group rounded-lg overflow-hidden';

            if (item.type === 'image') {
                div.innerHTML = `
                    <div class="relative cursor-pointer" onclick="openGalleryPreview('${item.url}', '${item.type}')">
                        <img src="${item.url}"
                             alt="${item.caption || ''}"
                             class="w-full h-auto rounded-lg transform hover:scale-[1.02] transition-transform duration-300">
                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                `;
            } else if (item.type === 'video') {
                div.innerHTML = `
                    <div class="relative cursor-pointer" onclick="openGalleryPreview('${item.url}', '${item.type}')">
                        <video src="${item.url}"
                               class="w-full h-auto rounded-lg transform hover:scale-[1.02] transition-transform duration-300">
                        </video>
                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="absolute bottom-2 right-2 bg-black/70 rounded-full p-2">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                            </svg>
                        </div>
                    </div>
                `;
            }
            galleryContainer.appendChild(div);
        });
    }

    function openGalleryPreview(url, type) {
        const preview = document.createElement('div');
        preview.className = 'fixed inset-0 z-[60] bg-black/95 flex items-center justify-center p-4';

        const content = type === 'video'
            ? `<video src="${url}" controls class="max-h-[90vh] max-w-[90vw] rounded-lg"></video>`
            : `<img src="${url}" class="max-h-[90vh] max-w-[90vw] object-contain rounded-lg">`;

        preview.innerHTML = `
            <div class="relative max-h-[90vh] max-w-[90vw]">
                ${content}
                <button onclick="this.closest('.fixed').remove()"
                        class="absolute -top-4 -right-4 bg-white/10 hover:bg-white/20 rounded-full p-2 transition-colors">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        `;

        // Add keyboard event listener for closing with Escape key
        const handleKeyDown = (e) => {
            if (e.key === 'Escape') {
                preview.remove();
                document.removeEventListener('keydown', handleKeyDown);
            }
        };
        document.addEventListener('keydown', handleKeyDown);

        // Add click outside to close
        preview.addEventListener('click', (e) => {
            if (e.target === preview) {
                preview.remove();
                document.removeEventListener('keydown', handleKeyDown);
            }
        });

        document.body.appendChild(preview);
    }

    function closeViewModal() {
        document.getElementById('viewPastEventModal').classList.add('hidden');
        currentViewingEventId = null;
    }
    </script>
</x-app-layout>
