<x-app-layout>
    <div x-data="{ testimonial: null }">
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Client Testimonials') }}
                </h2>
                <button @click="$dispatch('open-modal', 'new-testimonial-conversation')"
                        class="px-4 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors">
                    New Conversation
                </button>
            </div>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- Success Message -->
                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-100 dark:bg-green-800 text-green-700 dark:text-green-200 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Grid Layout -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($testimonials as $testimonial)
                        <div class="relative {{ $testimonial->is_featured ? 'ring-2 ring-primary-500 dark:ring-primary-400' : '' }}
                                    bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg h-[32rem] flex flex-col">

                            @if($testimonial->is_featured)
                                <div class="absolute top-0 right-0 -mt-1 -mr-1">
                                    <span class="relative flex h-3 w-3">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-3 w-3 bg-primary-500"></span>
                                    </span>
                                </div>
                            @endif

                            <!-- Chat Header -->
                            <div class="bg-primary-600 p-4 flex-shrink-0">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-3">
                                        @if($testimonial->client_avatar)
                                            <img src="{{ $testimonial->client_avatar }}"
                                                 alt="{{ $testimonial->client_name }}"
                                                 class="w-10 h-10 rounded-full object-cover">
                                        @else
                                            <div class="w-10 h-10 rounded-full bg-primary-400 flex items-center justify-center">
                                                <span class="text-white text-lg font-medium">
                                                    {{ substr($testimonial->client_name, 0, 2) }}
                                                </span>
                                            </div>
                                        @endif
                                        <div class="text-white">
                                            <h3 class="font-medium truncate max-w-[150px]" title="{{ $testimonial->client_name }}">
                                                {{ $testimonial->client_name }}
                                            </h3>
                                            @if($testimonial->event_type)
                                                <p class="text-sm text-primary-100 truncate max-w-[150px]" title="{{ $testimonial->event_type }}">
                                                    {{ $testimonial->event_type }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <button @click="$dispatch('open-modal', 'edit-testimonial-{{ $testimonial->id }}')"
                                                class="text-white/80 hover:text-white">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </button>
                                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                                              method="POST"
                                              class="inline"
                                              onsubmit="return confirm('Delete this conversation?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-white/80 hover:text-white">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Chat Messages -->
                            <div class="bg-[url('/images/chat-bg.png')] dark:bg-[url('/images/chat-bg-dark.png')] p-4 space-y-4 flex-1 overflow-y-auto">
                                <!-- Admin Initial Message -->
                                <div class="flex justify-end">
                                    <div class="max-w-[85%] bg-primary-100 dark:bg-primary-900 p-3 rounded-lg">
                                        <p class="text-gray-700 dark:text-gray-300 line-clamp-3 hover:line-clamp-none transition-all duration-200">
                                            Hi {{ $testimonial->client_name }}, thank you for choosing Taste by Laurie!
                                            @if($testimonial->event_type)
                                                We'd love to hear about your experience with the {{ strtolower($testimonial->event_type) }}.
                                            @endif
                                        </p>
                                        <span class="text-xs text-gray-500 dark:text-gray-400 mt-1 block">
                                            {{ $testimonial->created_at->format('g:i A') }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Client Message -->
                                <div class="flex gap-2">
                                    @if($testimonial->client_avatar)
                                        <img src="{{ $testimonial->client_avatar }}"
                                             alt="{{ $testimonial->client_name }}"
                                             class="w-8 h-8 rounded-full object-cover flex-shrink-0">
                                    @else
                                        <div class="w-8 h-8 rounded-full bg-gray-300 dark:bg-gray-700 flex items-center justify-center flex-shrink-0">
                                            <span class="text-gray-600 dark:text-gray-300 text-sm font-medium">
                                                {{ substr($testimonial->client_name, 0, 2) }}
                                            </span>
                                        </div>
                                    @endif
                                    <div class="max-w-[85%]">
                                        <div class="bg-white dark:bg-gray-800 p-3 rounded-lg shadow-sm">
                                            <p class="text-gray-700 dark:text-gray-300 line-clamp-4 hover:line-clamp-none transition-all duration-200">
                                                {{ $testimonial->message }}
                                            </p>
                                            <span class="text-xs text-gray-500 dark:text-gray-400 mt-1 block">
                                                {{ $testimonial->created_at->addMinute()->format('g:i A') }}
                                                @if($testimonial->is_featured)
                                                    · <span class="text-primary-600 dark:text-primary-400">Featured</span>
                                                @endif
                                            </span>
                                        </div>
                                        @if($testimonial->event_date)
                                            <div class="text-xs text-gray-500 dark:text-gray-400 mt-1 ml-2">
                                                Event Date: {{ $testimonial->event_date->format('M d, Y') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Admin Thank You Message -->
                                <div class="flex justify-end">
                                    <div class="max-w-[85%] bg-primary-100 dark:bg-primary-900 p-3 rounded-lg">
                                        <p class="text-gray-700 dark:text-gray-300 line-clamp-2 hover:line-clamp-none transition-all duration-200">
                                            Thank you for your feedback! We're glad you enjoyed your experience. 🙏
                                        </p>
                                        <span class="text-xs text-gray-500 dark:text-gray-400 mt-1 block">
                                            {{ $testimonial->created_at->addMinutes(2)->format('g:i A') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            @if($testimonial->is_featured)
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-xs font-medium bg-primary-100 text-primary-800 dark:bg-primary-900 dark:text-primary-200">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                                    </svg>
                                    Featured
                                </span>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $testimonials->links() }}
                </div>
            </div>
        </div>

        <!-- Create Modal -->
        <x-modal name="new-testimonial-conversation" :show="false" maxWidth="md">
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
                              isEdit: false
                          }">
                        @csrf
                        @include('admin.testimonials._form')
                    </form>
                </div>
            </div>
        </x-modal>

        <!-- Edit Modals -->
        @foreach($testimonials as $testimonial)
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
    </div>
</x-app-layout>
