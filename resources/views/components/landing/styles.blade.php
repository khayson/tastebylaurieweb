<style>
    [x-cloak] { display: none !important; }
    .mask-radial {
        mask-image: radial-gradient(circle at center, black, transparent 80%);
        -webkit-mask-image: radial-gradient(circle at center, black, transparent 80%);
    }
    .animate-float {
        animation: float 6s ease-in-out infinite;
    }
    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-20px); }
    }
    .text-stroke {
        -webkit-text-stroke: 1px currentColor;
        color: transparent;
    }

    /* Animation classes */
    .fade-in-up {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 1s ease, transform 1s ease;
    }

    .fade-in-left {
        opacity: 0;
        transform: translateX(-50px);
        transition: opacity 1s ease, transform 1s ease;
    }

    .fade-in-right {
        opacity: 0;
        transform: translateX(50px);
        transition: opacity 1s ease, transform 1s ease;
    }

    .appear {
        opacity: 1;
        transform: translate(0);
    }

    .stagger-animation > * {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .stagger-animation > *:nth-child(1) { transition-delay: 0.1s; }
    .stagger-animation > *:nth-child(2) { transition-delay: 0.2s; }
    .stagger-animation > *:nth-child(3) { transition-delay: 0.3s; }
    .stagger-animation > *:nth-child(4) { transition-delay: 0.4s; }
</style>
