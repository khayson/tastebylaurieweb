<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('scrollAnimation', () => ({
            activeSection: '',
            init() {
                // Intersection Observer for animations
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('appear');
                        }
                    });
                }, {
                    threshold: 0.1,
                    rootMargin: '50px'
                });

                document.querySelectorAll('.fade-in-up, .fade-in-left, .fade-in-right').forEach((el) => {
                    observer.observe(el);
                });

                const staggerObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.querySelectorAll('*').forEach(child => {
                                child.classList.add('appear');
                            });
                        }
                    });
                }, {
                    threshold: 0.1
                });

                document.querySelectorAll('.stagger-animation').forEach((el) => {
                    staggerObserver.observe(el);
                });

                // Smooth scroll for navigation links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            const offset = document.querySelector('nav').offsetHeight;
                            const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - offset;
                            window.scrollTo({
                                top: targetPosition,
                                behavior: 'smooth'
                            });
                        }
                    });
                });

                // Active section detection
                const sections = document.querySelectorAll('section[id]');
                const navLinks = document.querySelectorAll('a[href^="#"]');

                const activeSectionObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            this.activeSection = entry.target.id;
                            navLinks.forEach(link => {
                                const href = link.getAttribute('href').substring(1);
                                if (href === this.activeSection) {
                                    link.classList.add('text-primary-600', 'dark:text-primary-400');
                                } else {
                                    link.classList.remove('text-primary-600', 'dark:text-primary-400');
                                }
                            });
                        }
                    });
                }, {
                    threshold: 0.5
                });

                sections.forEach(section => {
                    activeSectionObserver.observe(section);
                });
            }
        }));
    });
</script>
