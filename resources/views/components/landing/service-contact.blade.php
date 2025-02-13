<section id="contact" class="relative py-24 bg-white dark:bg-gray-900" x-data="{
    formData: {
        name: '',
        email: '',
        phone: '',
        service: '{{ $service }}',
        package: '',
        message: '',
        date: '',
        guests: ''
    },
    isSubmitting: false,
    showSuccess: false,

    formatWhatsAppMessage() {
        return encodeURIComponent(`🎉 *NEW EVENT BOOKING REQUEST* 🎉

📅 *Event Details*
━━━━━━━━━━━━━━━
• Type: ${this.formData.service}
• Package: ${this.formData.package}
• Date: ${this.formData.date}
• Guests: ${this.formData.guests} people

👤 *Client Information*
━━━━━━━━━━━━━━━
• Name: ${this.formData.name}
• Email: ${this.formData.email}
• Phone: ${this.formData.phone}

📝 *Additional Notes*
━━━━━━━━━━━━━━━
${this.formData.message || 'No additional notes provided'}

────────────────
Sent via Luxury Catering Website
────────────────`);
    },

    submitForm() {
        this.isSubmitting = true;
        const message = this.formatWhatsAppMessage();
        const whatsappUrl = `https://wa.me/233547222206?text=${message}`;
        window.open(whatsappUrl, '_blank');
        setTimeout(() => {
            this.isSubmitting = false;
            this.showSuccess = true;
            this.formData = {
                name: '',
                email: '',
                phone: '',
                service: '{{ $service }}',
                package: '',
                message: '',
                date: '',
                guests: ''
            };
        }, 1000);
    }
}">
    <!-- Decorative Background -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-primary-50/30 via-transparent to-primary-50/10 dark:from-primary-900/20 dark:to-primary-900/5"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-start">
            <!-- Contact Information -->
            <div class="space-y-12">
                <div class="space-y-6">
                    <span class="inline-block px-4 py-2 rounded-full bg-primary-100 dark:bg-primary-900/30 text-primary-600 dark:text-primary-400 font-medium tracking-wider uppercase text-sm">Book Your Event</span>
                    <h2 class="text-4xl sm:text-5xl font-playfair font-bold text-gray-900 dark:text-white">
                        Let's Plan Your
                        <span class="text-primary-600 dark:text-primary-400" x-text="serviceData[service].title"></span>
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                        Fill out the form below and our team will get back to you within 24 hours to discuss your event details and create a personalized experience.
                    </p>
                </div>

                <!-- Contact Features -->
                <div class="grid sm:grid-cols-2 gap-8">
                    <div class="flex items-start space-x-4">
                        <span class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-primary-100 dark:bg-primary-900/30">
                            <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </span>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Quick Response</h3>
                            <p class="mt-1 text-gray-600 dark:text-gray-300">24/7 availability for your inquiries</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-4">
                        <span class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-primary-100 dark:bg-primary-900/30">
                            <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </span>
                        <div>
                            <h3 class="font-semibold text-gray-900 dark:text-white">Custom Planning</h3>
                            <p class="mt-1 text-gray-600 dark:text-gray-300">Tailored to your specific needs</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <form @submit.prevent="submitForm" class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8">
                <!-- Success Message -->
                <div x-show="showSuccess" x-transition
                     class="bg-green-50 dark:bg-green-900/30 p-4 rounded-lg mb-6 flex items-center">
                    <svg class="w-5 h-5 text-green-500 dark:text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <p class="text-green-800 dark:text-green-200">Thank you for your inquiry! We'll be in touch soon.</p>
                </div>

                <div class="space-y-6">
                    <!-- Name and Email Fields -->
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                            <input type="text" id="name" x-model="formData.name" required
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" id="email" x-model="formData.email" required
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                        </div>
                    </div>

                    <!-- Phone and Package Fields -->
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone</label>
                            <input type="tel" id="phone" x-model="formData.phone" required
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                        </div>
                        <div>
                            <label for="package" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Preferred Package</label>
                            <select id="package" x-model="formData.package" required
                                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                                <option value="">Select a package</option>
                                <template x-for="package in serviceData[service].packages">
                                    <option :value="package.name" x-text="package.name"></option>
                                </template>
                            </select>
                        </div>
                    </div>

                    <!-- Date and Guests Fields -->
                    <div class="grid sm:grid-cols-2 gap-6">
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Event Date</label>
                            <input type="date" id="date" x-model="formData.date" required
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                        </div>
                        <div>
                            <label for="guests" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Number of Guests</label>
                            <input type="number" id="guests" x-model="formData.guests" required min="1"
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500">
                        </div>
                    </div>

                    <!-- Message Field -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Additional Details</label>
                        <textarea id="message" x-model="formData.message" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 shadow-sm focus:border-primary-500 focus:ring-primary-500"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit"
                            class="w-full flex justify-center items-center px-6 py-3 text-lg font-medium text-white bg-primary-600 rounded-lg hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-colors"
                            :disabled="isSubmitting">
                        <span x-show="!isSubmitting">Send Inquiry via WhatsApp</span>
                        <span x-show="isSubmitting" class="flex items-center">
                            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Processing...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
