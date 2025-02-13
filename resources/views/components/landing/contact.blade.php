<section id="contact" class="relative py-24 bg-white dark:bg-gray-900 overflow-hidden" x-data="{
    formData: {
        name: '',
        email: '',
        phone: '',
        eventType: '',
        guestCount: '',
        date: '',
        message: ''
    },
    eventTypes: ['Wedding', 'Corporate Event', 'Private Party', 'Special Occasion'],
    guestRanges: ['10-50', '51-100', '101-200', '201-500', '500+'],
    isSubmitting: false,
    showSuccess: false,
    formatWhatsAppMessage() {
        return encodeURIComponent(
            `*New Catering Inquiry*\n\n` +
            `Name: ${this.formData.name}\n` +
            `Email: ${this.formData.email}\n` +
            `Phone: ${this.formData.phone}\n` +
            `Event Type: ${this.formData.eventType}\n` +
            `Guest Count: ${this.formData.guestCount}\n` +
            `Event Date: ${this.formData.date}\n\n` +
            `Message: ${this.formData.message}`
        );
    },
    redirectToWhatsApp() {
        const whatsappNumber = '233539696408';
        const message = this.formatWhatsAppMessage();
        window.open(`https://wa.me/${whatsappNumber}?text=${message}`, '_blank');
        this.showSuccess = true;
        setTimeout(() => {
            this.showSuccess = false;
            this.formData = {name: '', email: '', phone: '', eventType: '', guestCount: '', date: '', message: ''};
        }, 3000);
    }
}">
    <!-- Decorative Background -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-50/30 via-transparent to-primary-50/10 dark:from-primary-900/20 dark:to-primary-900/5"></div>
        <div class="absolute bottom-0 right-0 w-full h-1/2 bg-gradient-to-t from-primary-50/20 to-transparent dark:from-primary-900/10"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-start">
            <!-- Contact Information -->
            <div class="space-y-12">
                <!-- Section Header -->
                <div class="space-y-4">
                    <span class="text-primary-600 dark:text-primary-400 font-medium tracking-wider uppercase">Get in Touch</span>
                    <h2 class="text-4xl sm:text-5xl font-playfair font-bold text-gray-900 dark:text-white">
                        Let's Create Something
                        <span class="text-primary-600 dark:text-primary-400">Extraordinary</span>
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        Transform your event into an unforgettable experience with our bespoke catering services. Available 24/7 to discuss your requirements.
                    </p>
                </div>

                <!-- Contact Cards -->
                <div class="grid sm:grid-cols-2 gap-6">
                    <!-- Direct Contact -->
                    <a href="tel:+233547222206" class="group bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-xl bg-primary-100 dark:bg-primary-900/50 group-hover:bg-primary-600 dark:group-hover:bg-primary-600 transition-colors duration-300">
                                <svg class="w-6 h-6 text-primary-600 dark:text-primary-400 group-hover:text-white transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white">Call Us</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-300">+233 53 9696 408</p>
                                <p class="text-sm text-primary-600 dark:text-primary-400">Available 24/7</p>
                            </div>
                        </div>
                    </a>

                    <!-- WhatsApp -->
                    <a href="https://wa.me/233539696408" target="_blank" class="group bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-xl bg-green-100 dark:bg-green-900/50 group-hover:bg-green-600 dark:group-hover:bg-green-600 transition-colors duration-300">
                                <svg class="w-6 h-6 text-green-600 dark:text-green-400 group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 dark:text-white">WhatsApp</h3>
                                <p class="mt-2 text-gray-600 dark:text-gray-300">Direct Message</p>
                                <p class="text-sm text-green-600 dark:text-green-400">Instant Response</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 shadow-xl">
                <form @submit.prevent="redirectToWhatsApp" class="space-y-6">
                    <div class="grid sm:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Name</label>
                            <input type="text" id="name" x-model="formData.name" required
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                          bg-white dark:bg-gray-700
                                          text-gray-900 dark:text-gray-100
                                          placeholder-gray-500 dark:placeholder-gray-400
                                          focus:border-primary-500 dark:focus:border-primary-400
                                          focus:ring-primary-500 dark:focus:ring-primary-400
                                          shadow-sm transition-colors duration-200">
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                            <input type="email" id="email" x-model="formData.email" required
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                          bg-white dark:bg-gray-700
                                          text-gray-900 dark:text-gray-100
                                          placeholder-gray-500 dark:placeholder-gray-400
                                          focus:border-primary-500 dark:focus:border-primary-400
                                          focus:ring-primary-500 dark:focus:ring-primary-400
                                          shadow-sm transition-colors duration-200">
                        </div>

                        <!-- Phone -->
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Phone</label>
                            <input type="tel" id="phone" x-model="formData.phone" required
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                          bg-white dark:bg-gray-700
                                          text-gray-900 dark:text-gray-100
                                          placeholder-gray-500 dark:placeholder-gray-400
                                          focus:border-primary-500 dark:focus:border-primary-400
                                          focus:ring-primary-500 dark:focus:ring-primary-400
                                          shadow-sm transition-colors duration-200">
                        </div>

                        <!-- Event Type -->
                        <div>
                            <label for="eventType" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Event Type</label>
                            <select id="eventType" x-model="formData.eventType" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                           bg-white dark:bg-gray-700
                                           text-gray-900 dark:text-gray-100
                                           focus:border-primary-500 dark:focus:border-primary-400
                                           focus:ring-primary-500 dark:focus:ring-primary-400
                                           shadow-sm transition-colors duration-200">
                                <option value="" class="dark:bg-gray-700">Select Type</option>
                                <template x-for="type in eventTypes" :key="type">
                                    <option x-text="type" class="dark:bg-gray-700"></option>
                                </template>
                            </select>
                        </div>

                        <!-- Guest Count -->
                        <div>
                            <label for="guestCount" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Number of Guests</label>
                            <select id="guestCount" x-model="formData.guestCount" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                           bg-white dark:bg-gray-700
                                           text-gray-900 dark:text-gray-100
                                           focus:border-primary-500 dark:focus:border-primary-400
                                           focus:ring-primary-500 dark:focus:ring-primary-400
                                           shadow-sm transition-colors duration-200">
                                <option value="" class="dark:bg-gray-700">Select Range</option>
                                <template x-for="range in guestRanges" :key="range">
                                    <option x-text="range" class="dark:bg-gray-700"></option>
                                </template>
                            </select>
                        </div>

                        <!-- Event Date -->
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Event Date</label>
                            <input type="date" id="date" x-model="formData.date" required
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                          bg-white dark:bg-gray-700
                                          text-gray-900 dark:text-gray-100
                                          focus:border-primary-500 dark:focus:border-primary-400
                                          focus:ring-primary-500 dark:focus:ring-primary-400
                                          shadow-sm transition-colors duration-200">
                        </div>
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Additional Details</label>
                        <textarea id="message" x-model="formData.message" rows="4" required
                                  class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600
                                         bg-white dark:bg-gray-700
                                         text-gray-900 dark:text-gray-100
                                         placeholder-gray-500 dark:placeholder-gray-400
                                         focus:border-primary-500 dark:focus:border-primary-400
                                         focus:ring-primary-500 dark:focus:ring-primary-400
                                         shadow-sm transition-colors duration-200"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                                class="w-full flex justify-center items-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-300">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/>
                            </svg>
                            Continue on WhatsApp
                        </button>
                    </div>

                    <!-- Success Message -->
                    <div x-show="showSuccess"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="absolute inset-0 flex items-center justify-center bg-white/95 dark:bg-gray-800/95 rounded-2xl">
                        <div class="text-center p-6">
                            <div class="w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Redirecting to WhatsApp!</h3>
                            <p class="text-gray-600 dark:text-gray-300">Continue your conversation with our team.</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
