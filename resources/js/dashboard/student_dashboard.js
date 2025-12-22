// resources/js/app.js

// Animate progress bars on load
function animateProgressBars() {
    const progressBars = document.querySelectorAll('.progress-fill');
    progressBars.forEach((bar, index) => {
        const targetWidth = bar.style.width; // Get the target width from inline style
        bar.style.width = '0%'; // Start from 0
        setTimeout(() => {
            bar.style.transition = 'width 1.5s ease-out';
            bar.style.width = targetWidth;
        }, index * 200); // Stagger animations
    });
}

// Fade-in animation for cards
function fadeInCards() {
    const cards = document.querySelectorAll('.stat-card, .module-item, .action-card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100); // Staggered delay
            }
        });
    }, { threshold: 0.1 });

    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.8s ease-out, transform 0.8s ease-out';
        observer.observe(card);
    });
}

// Add hover effects (enhance existing CSS)
function addHoverEffects() {
    const buttons = document.querySelectorAll('.primary-btn, .secondary-btn, .view-topics-btn');
    buttons.forEach(btn => {
        btn.addEventListener('mouseenter', () => {
            btn.style.transform = 'scale(1.05)';
        });
        btn.addEventListener('mouseleave', () => {
            btn.style.transform = 'scale(1)';
        });
    });
}

// Initialize animations on DOM load
document.addEventListener('DOMContentLoaded', () => {
    animateProgressBars();
    fadeInCards();
    addHoverEffects();
});