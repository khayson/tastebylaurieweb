import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Check for dark mode preference
if (localStorage.getItem('darkMode') === 'true' ||
    (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
    localStorage.setItem('darkMode', 'true');
} else {
    document.documentElement.classList.remove('dark');
    localStorage.setItem('darkMode', 'false');
}
