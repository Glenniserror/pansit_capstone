// ================= ADVANCED SCROLL REVEAL SYSTEM =================
// Enterprise-grade, performance-optimized scroll reveal with multi-axis animations, 
// custom easing, callbacks, and advanced intersection handling

class AdvancedScrollReveal {
    constructor(options = {}) {
        this.options = {
            threshold: [0, 0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9, 1.0], // Multiple thresholds for granular control
            rootMargin: '0px 0px -10% 0px',
            staggerDelay: 80, // Reduced for faster, more premium feel
            once: true,
            direction: 'vertical', // 'vertical', 'horizontal', or 'both'
            easing: 'cubic-bezier(0.25, 0.46, 0.45, 0.94)', // Custom easing function
            duration: 800, // Animation duration in ms
            delay: 0, // Base delay
            useRAF: true, // Use requestAnimationFrame for smoother animations
            enableIntersectionRatio: true, // Use intersection ratio for progressive animations
            ...options
        };
        
        this.observers = new Map(); // Support multiple observers
        this.elements = new WeakMap(); // Store element-specific data
        this.animationFrame = null;
        this.isDestroyed = false;
        
        this.init();
    }
    
    init() {
        // Create main observer
        this.createObserver('main');
        
        // Initialize performance monitoring
        this.performanceMetrics = {
            totalElements: 0,
            revealedElements: 0,
            averageRevealTime: 0,
            startTime: performance.now()
        };
        
        // Observe all reveal elements
        this.observeElements();
        
        // Setup advanced features
        this.setupAdvancedFeatures();
    }
    
    createObserver(name, customOptions = {}) {
        const observerOptions = {
            threshold: this.options.threshold,
            rootMargin: this.options.rootMargin,
            root: customOptions.root || null,
            ...customOptions
        };
        
        const observer = new IntersectionObserver(
            this.handleIntersection.bind(this, name),
            observerOptions
        );
        
        this.observers.set(name, observer);
        return observer;
    }
    
    observeElements(selector = '.reveal') {
        const elements = document.querySelectorAll(selector);
        this.performanceMetrics.totalElements = elements.length;
        
        elements.forEach((el, index) => {
            const elementData = {
                index,
                revealed: false,
                revealTime: null,
                intersectionRatio: 0,
                direction: this.getElementDirection(el),
                animationType: el.dataset.revealAnimation || 'default',
                customDelay: parseInt(el.dataset.revealDelay) || 0,
                customDuration: parseInt(el.dataset.revealDuration) || this.options.duration,
                customEasing: el.dataset.revealEasing || this.options.easing,
                callbacks: {
                    onEnter: el.dataset.onEnter ? new Function(el.dataset.onEnter) : null,
                    onExit: el.dataset.onExit ? new Function(el.dataset.onExit) : null,
                    onProgress: el.dataset.onProgress ? new Function(el.dataset.onProgress) : null
                }
            };
            
            this.elements.set(el, elementData);
            
            // Set initial styles
            this.setInitialStyles(el, elementData);
            
            // Observe with main observer
            this.observers.get('main').observe(el);
            
            // Optional: Create element-specific observer for advanced features
            if (this.options.enableIntersectionRatio) {
                this.createElementObserver(el, elementData);
            }
        });
    }
    
    setInitialStyles(element, data) {
        const transform = this.getInitialTransform(data.animationType, data.direction);
        
        element.style.opacity = '0';
        element.style.transform = transform;
        element.style.transition = `opacity ${data.customDuration}ms ${data.customEasing}, transform ${data.customDuration}ms ${data.customEasing}`;
        element.style.transitionDelay = `${this.options.delay + data.customDelay}ms`;
        element.style.willChange = 'opacity, transform'; // Optimize for animations
    }
    
    getInitialTransform(animationType, direction) {
        const distance = 60; // Configurable distance
        
        switch (animationType) {
            case 'fade-in-left':
                return `translateX(-${distance}px)`;
            case 'fade-in-right':
                return `translateX(${distance}px)`;
            case 'fade-in-up':
                return `translateY(${distance}px)`;
            case 'fade-in-down':
                return `translateY(-${distance}px)`;
            case 'scale-in':
                return 'scale(0.8)';
            case 'rotate-in':
                return 'rotate(-10deg) scale(0.9)';
            case 'flip-in':
                return 'rotateY(-90deg)';
            default:
                return direction === 'up' ? `translateY(${distance}px)` : `translateY(-${distance}px)`;
        }
    }
    
    getElementDirection(element) {
        const rect = element.getBoundingClientRect();
        const windowHeight = window.innerHeight;
        const windowWidth = window.innerWidth;
        
        if (this.options.direction === 'horizontal') {
            return rect.left < windowWidth / 2 ? 'left' : 'right';
        } else if (this.options.direction === 'both') {
            const vertical = rect.top < windowHeight / 2 ? 'up' : 'down';
            const horizontal = rect.left < windowWidth / 2 ? 'left' : 'right';
            return `${vertical}-${horizontal}`;
        }
        
        return rect.top < windowHeight / 2 ? 'up' : 'down';
    }
    
    createElementObserver(element, data) {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach(entry => {
                    data.intersectionRatio = entry.intersectionRatio;
                    
                    if (data.callbacks.onProgress) {
                        data.callbacks.onProgress(entry.intersectionRatio, element);
                    }
                    
                    // Progressive animation based on intersection ratio
                    if (!data.revealed) {
                        this.animateProgressive(element, data, entry.intersectionRatio);
                    }
                });
            },
            { threshold: [0, 0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9, 1.0] }
        );
        
        observer.observe(element);
        this.observers.set(`element-${data.index}`, observer);
    }
    
    handleIntersection(observerName, entries) {
        if (this.isDestroyed) return;
        
        entries.forEach((entry) => {
            const data = this.elements.get(entry.target);
            if (!data) return;
            
            if (entry.isIntersecting && !data.revealed) {
                this.revealElement(entry.target, data);
            } else if (!entry.isIntersecting && !this.options.once && data.revealed) {
                this.hideElement(entry.target, data);
            }
        });
    }
    
    revealElement(element, data) {
        data.revealed = true;
        data.revealTime = performance.now();
        this.performanceMetrics.revealedElements++;
        
        if (this.options.useRAF) {
            this.animateWithRAF(element, data, 'reveal');
        } else {
            element.classList.add('show');
        }
        
        // Execute callback
        if (data.callbacks.onEnter) {
            data.callbacks.onEnter(element, data);
        }
        
        // Update performance metrics
        this.updatePerformanceMetrics();
    }
    
    hideElement(element, data) {
        data.revealed = false;
        
        if (this.options.useRAF) {
            this.animateWithRAF(element, data, 'hide');
        } else {
            element.classList.remove('show');
        }
        
        // Execute callback
        if (data.callbacks.onExit) {
            data.callbacks.onExit(element, data);
        }
    }
    
    animateWithRAF(element, data, action) {
        const startTime = performance.now();
        const startOpacity = parseFloat(getComputedStyle(element).opacity) || 0;
        const endOpacity = action === 'reveal' ? 1 : 0;
        
        const animate = (currentTime) => {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / data.customDuration, 1);
            
            const easedProgress = this.applyEasing(progress, data.customEasing);
            const currentOpacity = startOpacity + (endOpacity - startOpacity) * easedProgress;
            
            element.style.opacity = currentOpacity;
            
            if (action === 'reveal') {
                element.style.transform = this.getTransformAtProgress(data.animationType, easedProgress);
            }
            
            if (progress < 1) {
                this.animationFrame = requestAnimationFrame(animate);
            } else {
                if (action === 'reveal') {
                    element.classList.add('show');
                } else {
                    element.classList.remove('show');
                }
            }
        };
        
        this.animationFrame = requestAnimationFrame(animate);
    }
    
    animateProgressive(element, data, ratio) {
        const easedRatio = this.applyEasing(ratio, data.customEasing);
        element.style.opacity = easedRatio;
        element.style.transform = this.getTransformAtProgress(data.animationType, easedRatio);
    }
    
    getTransformAtProgress(animationType, progress) {
        const distance = 60 * (1 - progress);
        
        switch (animationType) {
            case 'fade-in-left':
                return `translateX(-${distance}px)`;
            case 'fade-in-right':
                return `translateX(${distance}px)`;
            case 'fade-in-up':
                return `translateY(${distance}px)`;
            case 'fade-in-down':
                return `translateY(-${distance}px)`;
            case 'scale-in':
                return `scale(${0.8 + 0.2 * progress})`;
            case 'rotate-in':
                return `rotate(${-10 * (1 - progress)}deg) scale(${0.9 + 0.1 * progress})`;
            case 'flip-in':
                return `rotateY(${-90 * (1 - progress)}deg)`;
            default:
                return `translateY(${distance}px)`;
        }
    }
    
    applyEasing(progress, easing) {
        // Parse cubic-bezier and apply custom easing
        if (easing.startsWith('cubic-bezier')) {
            const values = easing.match(/cubic-bezier\$([^)]+)\$/)[1].split(',').map(parseFloat);
            return this.cubicBezier(progress, ...values);
        }
        return progress; // Linear fallback
    }
    
    cubicBezier(t, p0, p1, p2, p3) {
        // Simplified cubic bezier calculation
        const u = 1 - t;
        return 3 * u * u * t * p1 + 3 * u * t * t * p2 + t * t * t * p3;
    }
    
    setupAdvancedFeatures() {
        // Keyboard navigation support
        this.setupKeyboardNavigation();
        
        // Reduced motion support
        this.setupReducedMotion();
        
        // Intersection observer polyfill check
        this.checkIntersectionObserverSupport();
    }
    
    setupKeyboardNavigation() {
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Tab') {
                // Reveal elements as they receive focus
                const focusedElement = document.activeElement;
                if (focusedElement && focusedElement.classList.contains('reveal')) {
                    const data = this.elements.get(focusedElement);
                    if (data && !data.revealed) {
                        this.revealElement(focusedElement, data);
                    }
                }
            }
        });
    }
    
    setupReducedMotion() {
        const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (prefersReducedMotion) {
            this.options.duration = 0;
            this.options.staggerDelay = 0;
        }
    }
    
    checkIntersectionObserverSupport() {
        if (!('IntersectionObserver' in window)) {
            console.warn('IntersectionObserver not supported. Falling back to scroll event.');
            this.fallbackToScrollEvent();
        }
    }
    
    fallbackToScrollEvent() {
        // Basic scroll-based reveal as fallback
        const handleScroll = () => {
            const elements = document.querySelectorAll('.reveal');
            elements.forEach(el => {
                const data = this.elements.get(el);
                if (!data || data.revealed) return;
                
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight * 0.85) {
                    this.revealElement(el, data);
                }
            });
        };
        
        window.addEventListener('scroll', handleScroll, { passive: true });
    }
    
    updatePerformanceMetrics() {
        const currentTime = performance.now();
        this.performanceMetrics.averageRevealTime = 
            (currentTime - this.performanceMetrics.startTime) / this.performanceMetrics.revealedElements;
    }
    
    // Public API methods
    refresh(selector = '.reveal') {
        this.destroy();
        this.init();
        this.observeElements(selector);
    }
    
    revealAll() {
        this.elements.forEach((data, element) => {
            if (!data.revealed) {
                this.revealElement(element, data);
            }
        });
    }
    
    hideAll() {
        this.elements.forEach((data, element) => {
            if (data.revealed) {
                this.hideElement(element, data);
            }
        });
    }
    
    addElement(element, options = {}) {
        const data = {
            ...this.elements.get(element) || {},
            ...options
        };
        this.elements.set(element, data);
        this.setInitialStyles(element, data);
        this.observers.get('main').observe(element);
    }
    
    removeElement(element) {
        this.observers.get('main').unobserve(element);
        this.elements.delete(element);
    }
    
    getMetrics() {
        return { ...this.performanceMetrics };
    }
    
    destroy() {
        this.isDestroyed = true;
        
        if (this.animationFrame) {
            cancelAnimationFrame(this.animationFrame);
        }
        
        this.observers.forEach(observer => observer.disconnect());
        this.observers.clear();
        this.elements = new WeakMap();
    }
}

// ================= INITIALIZATION =================
document.addEventListener('DOMContentLoaded', () => {
    // Initialize with advanced options
    window.scrollReveal = new AdvancedScrollReveal({
        threshold: [0, 0.2, 0.4, 0.6, 0.8, 1.0],
        staggerDelay: 60,
        duration: 1000,
        easing: 'cubic-bezier(0.23, 1, 0.32, 1)', // Bounce-like easing
        useRAF: true,
        enableIntersectionRatio: true,
        direction: 'both'
    });
    
    // Optional: Add resize handling with debounce
    let resizeTimeout;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            window.scrollReveal.refresh();
        }, 200);
    });
    
    // Optional: Expose API for debugging
    if (window.location.search.includes('debug=reveal')) {
        console.log('ScrollReveal Debug Mode Enabled');
        window.addEventListener('keydown', (e) => {
            if (e.key === 'r' && e.ctrlKey) {
                console.log('Revealing all elements...');
                window.scrollReveal.revealAll();
            }
            if (e.key === 'h' && e.ctrlKey) {
                console.log('Hiding all elements...');
                window.scrollReveal.hideAll();
            }
        });
    }
});

// ================= USAGE EXAMPLES =================
/*
HTML Usage:
<div class="reveal" data-reveal-animation="fade-in-left" data-reveal-delay="200" data-reveal-duration="1200" data-on-enter="console.log('Entered!')"></div>

JavaScript API:
scrollReveal.addElement(document.querySelector('.new-element'), { animationType: 'scale-in' });
scrollReveal.revealAll();
scrollReveal.getMetrics();
*/