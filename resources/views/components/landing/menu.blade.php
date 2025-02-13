<section id="menu" class="relative py-24 bg-white dark:bg-gray-900 overflow-hidden" x-data="{
    activeCategory: 'starters',
    categories: {
        starters: {
            title: 'Starters Selection',
            subtitle: 'Begin Your Journey',
            description: 'Choose from our carefully curated starter combinations',
            packages: [
                {
                    name: 'Classic Appetizers',
                    items: [
                        'Samosa',
                        'Spring Rolls',
                        'Meat Skewers',
                        'Goat Light Soup'
                    ],
                    serves: '8-10 guests'
                },
                {
                    name: 'Savory Bites',
                    items: [
                        'Quiche',
                        'Meatballs',
                        'Chicken Wrap',
                        'Yam Balls'
                    ],
                    serves: '8-10 guests'
                },
                {
                    name: 'Signature Starters',
                    items: [
                        'Club Sandwich',
                        'Chicken Kebab',
                        'Mini Burgers',
                        'Spicy Gizzard Skewers'
                    ],
                    serves: '8-10 guests'
                }
            ]
        },
        mains: {
            title: 'Main Course Collections',
            subtitle: 'The Heart of Your Event',
            description: 'Exquisite main course combinations for your gathering',
            packages: [
                {
                    name: 'Ghanaian Delights',
                    items: [
                        'Jollof Rice',
                        'Fried Rice',
                        'Curried Rice/Waakye',
                        'Banku & Tilapia'
                    ],
                    serves: '12-15 guests'
                },
                {
                    name: 'Continental Classics',
                    items: [
                        'Lasagna',
                        'Chicken Alfredo',
                        'Roasted Garlic Potatoes',
                        'Pesto Pasta'
                    ],
                    serves: '12-15 guests'
                },
                {
                    name: 'Local Favorites',
                    items: [
                        'Fufu with Goat Light Soup',
                        'Rice Balls with Groundnut Soup',
                        'Apem/Bayere Ampesi with Kontomire Stew',
                        'Kokonte and Groundnut Soup'
                    ],
                    serves: '12-15 guests'
                }
            ]
        },
        desserts: {
            title: 'Dessert Ensembles',
            subtitle: 'Sweet Endings',
            description: 'Delightful dessert combinations to complete your meal',
            packages: [
                {
                    name: 'Classic Patisserie',
                    items: [
                        'Red Velvet Slice',
                        'Chocolate Cake Slice',
                        'Vanilla Cake Slice',
                        'Fruit Tart'
                    ],
                    serves: '6-8 guests'
                },
                {
                    name: 'Chocolate Lovers\' Dream',
                    items: [
                        'Dark Chocolate Mousse',
                        'White Chocolate Cheesecake',
                        'Chocolate-Dipped Strawberries',
                        'Chocolate Lava Cakes'
                    ],
                    serves: '6-8 guests'
                },
                {
                    name: 'International Sweets',
                    items: [
                        'Tigernut Pudding',
                        'Cinnamon and Apple Cake Slice',
                        'Chocolate & Oreo Ice Cream',
                        'Fruit Fritters'
                    ],
                    serves: '6-8 guests'
                }
            ]
        }
    }
}">
    <!-- Decorative Background -->
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-primary-100/20 via-transparent to-transparent dark:from-primary-900/20"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-20">
            <span class="text-primary-600 dark:text-primary-400 font-medium tracking-wider uppercase">Culinary Excellence</span>
            <h2 class="mt-3 text-4xl sm:text-5xl font-playfair font-bold text-gray-900 dark:text-white">
                Our Menu
            </h2>
            <div class="mt-4 w-20 h-1.5 bg-primary-600 dark:bg-primary-400 rounded-full mx-auto"></div>
        </div>

        <!-- Category Navigation -->
        <div class="flex justify-center mb-16">
            <div class="inline-flex p-1 space-x-1 bg-gray-100 dark:bg-gray-800 rounded-xl">
                <template x-for="(category, key) in categories" :key="key">
                    <button @click="activeCategory = key"
                            :class="{'bg-white dark:bg-gray-900 text-gray-900 dark:text-white shadow-md': activeCategory === key,
                                    'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white': activeCategory !== key}"
                            class="px-6 py-2.5 rounded-lg text-sm font-medium transition-all duration-300">
                        <span x-text="category.title"></span>
                    </button>
                </template>
            </div>
        </div>

        <!-- Menu Content -->
        <div class="relative">
            <template x-for="(category, key) in categories" :key="key">
                <div x-show="activeCategory === key"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     class="space-y-12">

                    <!-- Category Header -->
                    <div class="text-center max-w-2xl mx-auto mb-12">
                        <h3 class="text-2xl font-playfair font-bold text-gray-900 dark:text-white" x-text="category.subtitle"></h3>
                        <p class="mt-4 text-gray-600 dark:text-gray-400" x-text="category.description"></p>
                    </div>

                    <!-- Packages Grid -->
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <template x-for="(package, index) in category.packages" :key="index">
                            <div class="group bg-white dark:bg-gray-800 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden">
                                <div class="p-6">
                                    <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-4" x-text="package.name"></h4>
                                    <ul class="space-y-3">
                                        <template x-for="(item, i) in package.items" :key="i">
                                            <li class="flex items-start space-x-3">
                                                <svg class="w-5 h-5 text-primary-600 dark:text-primary-400 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                </svg>
                                                <span class="text-gray-600 dark:text-gray-300" x-text="item"></span>
                                            </li>
                                        </template>
                                    </ul>
                                    <div class="mt-6 pt-4 border-t border-gray-100 dark:border-gray-700">
                                        <span class="text-sm text-gray-500 dark:text-gray-400" x-text="'Serves ' + package.serves"></span>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </template>
        </div>

        <!-- Menu Footer with Download Button -->
        <div class="mt-20 text-center" x-data="{
            showDownloadModal: false,
            downloadType: '',
            whatsappNumber: '',
            isSubmitting: false,
            showSuccess: false,

            formatMenuMessage() {
                let menuText = '🍽️ *LUXURY CATERING MENU* 🍽️\n\n';

                for (const [category, data] of Object.entries(categories)) {
                    menuText += `*${data.title}*\n${data.subtitle}\n\n`;

                    data.packages.forEach(pkg => {
                        menuText += `📌 *${pkg.name}* (Serves ${pkg.serves})\n`;
                        pkg.items.forEach(item => menuText += `• ${item}\n`);
                        menuText += '\n';
                    });

                    menuText += '─────────────\n\n';
                }

                return encodeURIComponent(menuText);
            },

            async handleDownload() {
                if (this.downloadType === 'whatsapp') {
                    if (!this.whatsappNumber) return;

                    this.isSubmitting = true;
                    const message = this.formatMenuMessage();
                    window.open(`https://wa.me/${this.whatsappNumber}?text=${message}`, '_blank');
                    this.showSuccess = true;
                    setTimeout(() => {
                        this.isSubmitting = false;
                        this.showSuccess = false;
                        this.showDownloadModal = false;
                        this.whatsappNumber = '';
                    }, 2000);
                } else {
                    this.isSubmitting = true;
                    window.location.href = `/download-menu/${this.downloadType}`;
                    setTimeout(() => {
                        this.isSubmitting = false;
                        this.showDownloadModal = false;
                    }, 2000);
                }
            }
        }">
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Vegetarian (🌱) and Gluten-Free (GF) options available. Please inform our staff of any dietary requirements.
            </p>
            <button @click="showDownloadModal = true"
                    class="mt-8 inline-flex items-center px-6 py-3 border border-primary-600 dark:border-primary-400 text-primary-600 dark:text-primary-400 rounded-full hover:bg-primary-600 hover:text-white dark:hover:bg-primary-400 dark:hover:text-gray-900 transition-colors duration-300">
                Download Menu
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                </svg>
            </button>

            <!-- Download Modal -->
            <div x-show="showDownloadModal"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-50 overflow-y-auto"
                 style="display: none;">
                <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <!-- Background overlay -->
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 dark:bg-gray-900 opacity-75"></div>
                    </div>

                    <!-- Modal panel -->
                    <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6"
                         @click.away="showDownloadModal = false">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-primary-100 dark:bg-primary-900 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">
                                    Download Menu
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 dark:text-gray-400">
                                        Choose your preferred format to receive our detailed menu.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Success Message -->
                        <div x-show="showSuccess"
                             x-transition
                             class="mt-4 p-4 rounded-md bg-green-50 dark:bg-green-900">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-green-800 dark:text-green-200">
                                        Menu sent successfully!
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Download Options -->
                        <div class="mt-6 space-y-4">
                            <!-- Format Selection -->
                            <div class="grid grid-cols-3 gap-4">
                                <button @click="downloadType = 'pdf'"
                                        :class="{'bg-primary-50 dark:bg-primary-900 border-primary-600 dark:border-primary-400': downloadType === 'pdf'}"
                                        class="p-4 border-2 rounded-lg text-center hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                    <svg class="h-6 w-6 mx-auto text-gray-600 dark:text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2c.55 0 1-.45 1-1V7h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z"/>
                                    </svg>
                                    <span class="mt-2 block text-sm font-medium text-gray-900 dark:text-white">PDF</span>
                                </button>

                                <button @click="downloadType = 'excel'"
                                        :class="{'bg-primary-50 dark:bg-primary-900 border-primary-600 dark:border-primary-400': downloadType === 'excel'}"
                                        class="p-4 border-2 rounded-lg text-center hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                    <svg class="h-6 w-6 mx-auto text-gray-600 dark:text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M21.17 3.25Q21.5 3.25 21.76 3.5 22 3.74 22 4.08V19.92Q22 20.26 21.76 20.5 21.5 20.75 21.17 20.75H7.83Q7.5 20.75 7.24 20.5 7 20.26 7 19.92V4.08Q7 3.74 7.24 3.5 7.5 3.25 7.83 3.25H21.17M21.17 4.33H7.83V19.67H21.17V4.33M3 7.75H2V19.67H3V7.75M5 7.75H4V19.67H5V7.75M14.5 11.17H16.5L14.5 15.92H16.5L14.5 11.17M8.83 11.17H12.67V12.25H8.83V11.17M8.83 14.75H12.67V15.83H8.83V14.75Z"/>
                                    </svg>
                                    <span class="mt-2 block text-sm font-medium text-gray-900 dark:text-white">Excel</span>
                                </button>

                                <button @click="downloadType = 'whatsapp'"
                                        :class="{'bg-primary-50 dark:bg-primary-900 border-primary-600 dark:border-primary-400': downloadType === 'whatsapp'}"
                                        class="p-4 border-2 rounded-lg text-center hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                                    <svg class="h-6 w-6 mx-auto text-gray-600 dark:text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.03 14.69 2 12.04 2M12.05 3.67C14.25 3.67 16.31 4.53 17.87 6.09C19.42 7.65 20.28 9.72 20.28 11.92C20.28 16.46 16.58 20.15 12.04 20.15C10.56 20.15 9.11 19.76 7.85 19L7.55 18.83L4.43 19.65L5.26 16.61L5.06 16.29C4.24 15 3.8 13.47 3.8 11.91C3.81 7.37 7.5 3.67 12.05 3.67M8.53 7.33C8.37 7.33 8.1 7.39 7.87 7.64C7.65 7.89 7 8.5 7 9.71C7 10.93 7.89 12.1 8 12.27C8.14 12.44 9.76 14.94 12.25 16C12.84 16.27 13.3 16.42 13.66 16.53C14.25 16.72 14.79 16.69 15.22 16.63C15.7 16.56 16.68 16.03 16.89 15.45C17.1 14.87 17.1 14.38 17.04 14.27C16.97 14.17 16.81 14.11 16.56 14C16.31 13.86 15.09 13.26 14.87 13.18C14.64 13.1 14.5 13.06 14.31 13.3C14.15 13.55 13.67 14.11 13.53 14.27C13.38 14.44 13.24 14.46 13 14.34C12.74 14.21 11.94 13.95 11 13.11C10.26 12.45 9.77 11.64 9.62 11.39C9.5 11.15 9.61 11 9.73 10.89C9.84 10.78 10 10.6 10.1 10.45C10.23 10.31 10.27 10.2 10.35 10.04C10.43 9.87 10.39 9.73 10.33 9.61C10.27 9.5 9.77 8.26 9.56 7.77C9.36 7.29 9.16 7.35 9 7.34C8.86 7.34 8.7 7.33 8.53 7.33Z"/>
                                    </svg>
                                    <span class="mt-2 block text-sm font-medium text-gray-900 dark:text-white">WhatsApp</span>
                                </button>
                            </div>

                            <!-- WhatsApp Number Input -->
                            <div x-show="downloadType === 'whatsapp'" x-transition>
                                <label for="whatsapp-number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">WhatsApp Number</label>
                                <div class="mt-1">
                                    <input type="tel"
                                           id="whatsapp-number"
                                           x-model="whatsappNumber"
                                           placeholder="Enter your WhatsApp number"
                                           class="shadow-sm focus:ring-primary-500 focus:border-primary-500 block w-full sm:text-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-md">
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 sm:mt-8 sm:flex sm:flex-row-reverse">
                            <button type="button"
                                    @click="handleDownload()"
                                    :disabled="!downloadType || (downloadType === 'whatsapp' && !whatsappNumber)"
                                    class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary-600 text-base font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:ml-3 sm:w-auto sm:text-sm disabled:opacity-50 disabled:cursor-not-allowed">
                                <span x-show="!isSubmitting">Download</span>
                                <span x-show="isSubmitting" class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Processing...
                                </span>
                            </button>
                            <button type="button"
                                    @click="showDownloadModal = false"
                                    class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-700 text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 sm:mt-0 sm:w-auto sm:text-sm">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
