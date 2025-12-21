// ================= SCROLL REVEAL =================
// High-end, performance-optimized scroll reveal with staggered animations and advanced intersection handling

class ScrollRevealManager {
    constructor(options = {}) {
        this.options = {
            threshold: 0.15,
            rootMargin: '0px 0px -50px 0px', // Trigger slightly before fully in view for smoother effect
            staggerDelay: 120, // Milliseconds between staggered reveals
            once: true, // Animate only once per element
            ...options
        };
        
        this.observer = null;
        this.init();
    }
    
    init() {
        // Use passive listeners for better performance
        this.observer = new IntersectionObserver(
            this.handleIntersection.bind(this),
            {
                threshold: this.options.threshold,
                rootMargin: this.options.rootMargin,
                // Add root option if needed for specific containers
            }
        );
        
        // Observe all reveal elements
        this.observeElements();
    }
    
    observeElements() {
        const revealElements = document.querySelectorAll('.reveal');
        revealElements.forEach((el, index) => {
            // Add data attributes for advanced control
            el.dataset.revealIndex = index;
            el.dataset.revealDelay = `${index * this.options.staggerDelay}ms`;
            
            // Set initial styles for smooth animation
            el.style.transition = `opacity 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94), transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94)`;
            el.style.transitionDelay = el.dataset.revealDelay;
            
            this.observer.observe(el);
        });
    }
    
    handleIntersection(entries) {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                // Add show class with potential custom animations
                entry.target.classList.add('show');
                
                // Optional: Add direction-based animations
                this.addDirectionalAnimation(entry.target);
                
                // Unobserve if once is true for performance
                if (this.options.once) {
                    this.observer.unobserve(entry.target);
                }
            } else if (!this.options.once) {
                // Re-hide if not once (for repeated animations)
                entry.target.classList.remove('show');
            }
        });
    }
    
    addDirectionalAnimation(element) {
        // Optional: Add direction-based entrance animations
        const rect = element.getBoundingClientRect();
        const windowHeight = window.innerHeight;
        
        if (rect.top < windowHeight / 2) {
            // Coming from top
            element.style.transformOrigin = 'center top';
        } else {
            // Coming from bottom
            element.style.transformOrigin = 'center bottom';
        }
    }
    
    // Method to refresh observations (useful for dynamic content)
    refresh() {
        this.observer.disconnect();
        this.init();
    }
    
    // Cleanup method
    destroy() {
        if (this.observer) {
            this.observer.disconnect();
        }
    }
}

// Initialize with professional defaults
document.addEventListener('DOMContentLoaded', () => {
    const scrollReveal = new ScrollRevealManager({
        threshold: 0.2, // Slightly higher threshold for more precise triggering
        staggerDelay: 100, // Faster stagger for premium feel
        rootMargin: '0px 0px -10% 0px' // Trigger when 10% from bottom
    });
    
    // Optional: Add resize listener for dynamic adjustments
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            scrollReveal.refresh();
        }, 250);
    });
});

// ================= ADVANCED FEATURES =================
// Add support for custom reveal animations based on data attributes
document.addEventListener('DOMContentLoaded', () => {
    const customRevealElements = document.querySelectorAll('[data-reveal-animation]');
    
    customRevealElements.forEach(el => {
        const animationType = el.dataset.revealAnimation;
        
        // Apply custom animations based on type
        switch (animationType) {
            case 'fade-in-left':
                el.style.transform = 'translateX(-50px)';
                break;
            case 'fade-in-right':
                el.style.transform = 'translateX(50px)';
                break;
            case 'scale-in':
                el.style.transform = 'scale(0.8)';
                break;
            default:
                // Default transform from CSS
                break;
        }
    });
});