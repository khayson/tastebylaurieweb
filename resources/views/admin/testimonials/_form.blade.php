<div x-data="{
    featured: {{ isset($testimonial) ? ($testimonial->is_featured ? 'true' : 'false') : 'false' }},
    hasErrors: {{ $errors->any() ? 'true' : 'false' }},
    showErrors: false,
    init() {
        if (this.hasErrors) {
            this.showErrors = true;
            $dispatch('open-modal', '{{ isset($testimonial) ? "edit-testimonial-{$testimonial->id}" : "new-testimonial-conversation" }}');
        }
    }
}"
class="space-y-6">

    <!-- Error Alert -->
    <div x-show="showErrors"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform -translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform -translate-y-2"
         class="bg-red-50 dark:bg-red-900/50 p-4 rounded-lg">
        <div class="flex">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400 dark:text-red-300" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="ml-3">
                <h3 class="text-sm font-medium text-red-800 dark:text-red-200">
                    There were errors with your submission
                </h3>
                @if($errors->any())
                    <div class="mt-2 text-sm text-red-700 dark:text-red-300">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                    <button type="button"
                            @click="showErrors = false"
                            class="inline-flex rounded-md p-1.5 text-red-500 dark:text-red-300 hover:bg-red-100 dark:hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <span class="sr-only">Dismiss</span>
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Chat -->
    <div class="bg-gray-50 dark:bg-gray-900 p-4 rounded-lg space-y-3">
        <!-- Admin Message -->
        <div class="flex justify-end mb-3">
            <div class="max-w-[80%] bg-primary-100 dark:bg-primary-900 p-3 rounded-lg">
                <p class="text-gray-700 dark:text-gray-300">
                    Hi <span x-text="clientName || 'there'"></span>, thank you for choosing Taste by Laurie!
                    <span x-show="eventType">
                        We'd love to hear about your experience with the <span x-text="eventType.toLowerCase()"></span>.
                    </span>
                </p>
            </div>
        </div>

        <!-- Client Details Section -->
        <div class="space-y-4">
            <!-- Client Name -->
            <div>
                <x-input-label for="client_name" value="Client Name" />
                <x-text-input id="client_name"
                             name="client_name"
                             type="text"
                             class="mt-1 block w-full"
                             x-model="clientName"
                             required />
                <x-input-error :messages="$errors->get('client_name')" class="mt-2" />
            </div>

            <!-- Client Avatar -->
            <div>
                <x-input-label for="client_avatar" value="Client Profile Picture" />
                <div class="mt-1 flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center overflow-hidden">
                        <template x-if="isEdit && '{{ $testimonial->client_avatar ?? '' }}'">
                            <img src="{{ $testimonial->client_avatar ?? '' }}"
                                 alt="Client avatar"
                                 class="w-full h-full object-cover">
                        </template>
                        <template x-if="!isEdit || !'{{ $testimonial->client_avatar ?? '' }}'">
                            <svg class="w-6 h-6 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </template>
                    </div>
                    <input type="file"
                           id="client_avatar"
                           name="client_avatar"
                           accept="image/*"
                           class="block w-full text-sm text-gray-500 dark:text-gray-400
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-full file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-primary-50 file:text-primary-700
                                  dark:file:bg-primary-900 dark:file:text-primary-300
                                  hover:file:bg-primary-100 dark:hover:file:bg-primary-800">
                </div>
                <x-input-error :messages="$errors->get('client_avatar')" class="mt-2" />
            </div>

            <!-- Event Type -->
            <div>
                <x-input-label for="event_type" value="Event Type" />
                <x-text-input id="event_type"
                             name="event_type"
                             type="text"
                             class="mt-1 block w-full"
                             :value="old('event_type', $testimonial->event_type ?? '')"
                             x-model="eventType"
                             placeholder="e.g., Wedding, Birthday Party, Corporate Event" />
                <x-input-error :messages="$errors->get('event_type')" class="mt-2" />
            </div>

            <!-- Event Date -->
            <div>
                <x-input-label for="event_date" value="Event Date" />
                <x-text-input id="event_date"
                             name="event_date"
                             type="date"
                             class="mt-1 block w-full"
                             :value="isset($testimonial) && $testimonial->event_date ? $testimonial->event_date->format('Y-m-d') : old('event_date')" />
                <x-input-error :messages="$errors->get('event_date')" class="mt-2" />
            </div>

            <!-- Client Message -->
            <div>
                <x-input-label for="message" value="Client's Message" />
                <div class="mt-1 relative">
                    <x-textarea id="message"
                               name="message"
                               rows="4"
                               class="block w-full pr-10 resize-none"
                               x-model="message"
                               placeholder="Type client's feedback here..."
                               required></x-textarea>
                    <div class="absolute right-2 bottom-2 text-gray-400 dark:text-gray-600">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                        </svg>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('message')" class="mt-2" />
            </div>

            <!-- Featured Toggle -->
            <div x-data="{ featured: {{ isset($testimonial) ? ($testimonial->is_featured ? 'true' : 'false') : 'false' }} }"
                 class="relative flex items-start py-4 border-t border-gray-200 dark:border-gray-700">
                <div class="min-w-0 flex-1 text-sm">
                    <label for="is_featured" class="font-medium text-gray-700 dark:text-gray-200 select-none">
                        Feature this testimonial
                    </label>
                    <p class="text-gray-500 dark:text-gray-400">
                        Featured testimonials appear on the dashboard and are highlighted in the testimonials list.
                    </p>
                </div>
                <div class="ml-3 flex items-center">
                    <button type="button"
                            @click="featured = !featured"
                            :class="{ 'bg-gray-200 dark:bg-gray-700': !featured, 'bg-primary-600': featured }"
                            class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                            role="switch"
                            :aria-checked="featured">
                        <span class="sr-only">Feature this testimonial</span>
                        <span :class="{ 'translate-x-5': featured, 'translate-x-0': !featured }"
                              class="pointer-events-none relative inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out">
                            <span :class="{ 'opacity-0 duration-100 ease-out': featured, 'opacity-100 duration-200 ease-in': !featured }"
                                  class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity">
                                <svg class="h-3 w-3 text-gray-400" fill="none" viewBox="0 0 12 12">
                                    <path d="M4 8l2-2m0 0l2-2M6 6L4 4m2 2l2 2" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </span>
                            <span :class="{ 'opacity-100 duration-200 ease-in': featured, 'opacity-0 duration-100 ease-out': !featured }"
                                  class="absolute inset-0 flex h-full w-full items-center justify-center transition-opacity">
                                <svg class="h-3 w-3 text-primary-600" fill="currentColor" viewBox="0 0 12 12">
                                    <path d="M3.707 5.293a1 1 0 00-1.414 1.414l1.414-1.414zM5 8l-.707.707a1 1 0 001.414 0L5 8zm4.707-3.293a1 1 0 00-1.414-1.414l1.414 1.414zm-7.414 2l2 2 1.414-1.414-2-2-1.414 1.414zm3.414 2l4-4-1.414-1.414-4 4 1.414 1.414z"/>
                                </svg>
                            </span>
                        </span>
                    </button>
                    <!-- Hidden input to store the value -->
                    <input type="hidden"
                           name="is_featured"
                           :value="featured ? 1 : 0">
                </div>
            </div>
        </div>
    </div>

    <!-- Form Actions -->
    <div class="flex items-center justify-end gap-4">
        <x-secondary-button type="button"
                           @click="!hasErrors && $dispatch('close')"
                           :disabled="$errors->any()">
            Cancel
        </x-secondary-button>
        <x-primary-button type="submit"
                         x-data=""
                         @click="showErrors = true">
            <span x-show="!isEdit">Create Conversation</span>
            <span x-show="isEdit">Update Conversation</span>
        </x-primary-button>
    </div>
</div>
