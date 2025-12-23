// Animate progress bars on load with smoother transitions
function animateProgressBars() {
    const progressBars = document.querySelectorAll('.progress-fill');
    progressBars.forEach((bar, index) => {
        const targetWidth = bar.style.width; // Get the target width from inline style
        bar.style.width = '0%'; // Start from 0
        setTimeout(() => {
            bar.style.transition = 'width 2s ease-out'; // Smoother, longer animation
            bar.style.width = targetWidth;
        }, index * 300); // Increased stagger for better effect
    });
}

// Fade-in animation for cards with staggered delays
function fadeInCards() {
    const cards = document.querySelectorAll('.stat-card, .module-item, .action-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 200); // Longer stagger for drama
            }
        });
    }, { threshold: 0.1 });

    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 1s ease-out, transform 1s ease-out'; // Smoother transitions
        observer.observe(card);
    });
}

// Enhanced hover effects with lifts and glows
function addHoverEffects() {
    const buttons = document.querySelectorAll('.primary-btn, .secondary-btn, .view-topics-btn');
    const cards = document.querySelectorAll('.stat-card, .module-item, .action-card');

    // Button hover effects
    buttons.forEach(btn => {
        btn.addEventListener('mouseenter', () => {
            btn.style.transform = 'scale(1.05) translateY(-2px)';
            btn.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.2)'; // Glow effect
        });
        btn.addEventListener('mouseleave', () => {
            btn.style.transform = 'scale(1) translateY(0)';
            btn.style.boxShadow = '';
        });
        // Focus for accessibility
        btn.addEventListener('focus', () => {
            btn.style.boxShadow = '0 0 0 3px rgba(74, 144, 226, 0.5)';
        });
        btn.addEventListener('blur', () => {
            btn.style.boxShadow = '';
        });
        // Ripple effect on click
        btn.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(255, 255, 255, 0.6)';
            ripple.style.transform = 'scale(0)';
            ripple.style.animation = 'ripple 0.6s linear';
            ripple.style.left = (e.offsetX - 10) + 'px';
            ripple.style.top = (e.offsetY - 10) + 'px';
            ripple.style.width = '20px';
            ripple.style.height = '20px';
            this.appendChild(ripple);
            setTimeout(() => ripple.remove(), 600);
        });
    });

    // Card hover effects
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-8px)'; // Lift effect
            card.style.boxShadow = '0 10px 25px rgba(0, 0, 0, 0.15)'; // Enhanced shadow
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
            card.style.boxShadow = '';
        });
    });
}

// Add ripple animation CSS via JS (for button clicks)
function addRippleStyles() {
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        .primary-btn, .secondary-btn, .view-topics-btn {
            position: relative;
            overflow: hidden;
        }
    `;
    document.head.appendChild(style);
}

// Initialize animations on DOM load with error handling
document.addEventListener('DOMContentLoaded', () => {
    try {
        addRippleStyles(); // Add dynamic styles for ripples
        animateProgressBars();
        fadeInCards();
        addHoverEffects();
    } catch (error) {
        console.warn('Animation initialization failed:', error); // Graceful fallback
    }
});