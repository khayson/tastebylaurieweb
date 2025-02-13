<button x-data="{ showButton: false }"
        x-init="window.addEventListener('scroll', () => { showButton = window.pageYOffset > 500 })"
        x-show="showButton"
        x-transition.opacity
        @click="window.scrollTo({top: 0, behavior: 'smooth'})"
        class="fixed bottom-8 right-8 bg-primary-600 text-white p-3 rounded-full shadow-lg hover:bg-primary-700 transition z-50">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
    </svg>
</button>
