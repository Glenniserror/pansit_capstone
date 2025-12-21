// ================= SCROLL REVEAL =================
// Enhanced, professional scroll reveal animation with staggered delays, customizable options, and smooth performance.
// Supports data attributes for per-element control: data-animation, data-delay, data-duration, data-direction.

class ScrollReveal {
    constructor(options = {}) {
        this.threshold = options.threshold || 0.15; // Intersection threshold (0-1)
        this.rootMargin = options.rootMargin || '0px'; // Root margin for observer
        this.defaultDelay = options.defaultDelay || 0.12; // Default stagger delay in seconds
        this.defaultDuration = options.defaultDuration || 0.8; // Default animation duration in seconds
        this.defaultEasing = options.defaultEasing || 'cubic-bezier(0.25, 0.46, 0.45, 0.94)'; // Smooth easing
        this.animations = {
            'fade-in': { opacity: [0, 1], transform: ['translateY(20px)', 'translateY(0)'] },
            'slide-up': { opacity: [0, 1], transform: ['translateY(50px)', 'translateY(0)'] },
            'slide-down': { opacity: [0, 1], transform: ['translateY(-50px)', 'translateY(0)'] },
            'slide-left': { opacity: [0, 1], transform: ['translateX(50px)', 'translateX(0)'] },
            'slide-right': { opacity: [0, 1], transform: ['translateX(-50px)', 'translateX(0)'] },
            'scale-in': { opacity: [0, 1], transform: ['scale(0.8)', 'scale(1)'] },
            'rotate-in': { opacity: [0, 1], transform: ['rotate(-10deg) scale(0.9)', 'rotate(0deg) scale(1)'] }
        };
        this.revealElements = document.querySelectorAll('.reveal');
        this.observer = new IntersectionObserver(this.handleIntersection.bind(this), {
            threshold: this.threshold,
            rootMargin: this.rootMargin
        });
        this.init();
    }

    init() {
        this.revealElements.forEach((el, index) => {
            // Set default styles for hidden state
            el.style.opacity = '0';
            el.style.transform = this.getInitialTransform(el);
            el.style.transition = `opacity ${this.getDuration(el)}s ${this.getEasing(el)}, transform ${this.getDuration(el)}s ${this.getEasing(el)}`;
            el.style.transitionDelay = `${this.getDelay(el, index)}s`;
            this.observer.observe(el);
        });
    }

    handleIntersection(entries) {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                // Add 'show' class to trigger animation
                entry.target.classList.add('show');
                // Unobserve to animate only once
                this.observer.unobserve(entry.target);
            }
        });
    }

    getAnimation(el) {
        return el.dataset.animation || 'fade-in';
    }

    getDelay(el, index) {
        return parseFloat(el.dataset.delay) || (index * this.defaultDelay);
    }

    getDuration(el) {
        return parseFloat(el.dataset.duration) || this.defaultDuration;
    }

    getEasing(el) {
        return el.dataset.easing || this.defaultEasing;
    }

    getInitialTransform(el) {
        const animation = this.getAnimation(el);
        const animData = this.animations[animation];
        return animData ? animData.transform[0] : 'translateY(20px)';
    }
}

// Initialize with default options (customize as needed)
const scrollReveal = new ScrollReveal({
    threshold: 0.2, // Trigger when 20% visible
    defaultDelay: 0.15, // Stagger delay
    defaultDuration: 1.0, // Smoother duration
    defaultEasing: 'cubic-bezier(0.4, 0, 0.2, 1)' // Material Design easing for professionalism
});