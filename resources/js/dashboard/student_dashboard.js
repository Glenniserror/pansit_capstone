// Initialize Feather Icons
feather.replace();

// Progress bar animation on load
window.addEventListener('load', () => {
    document.querySelectorAll('.progress-bar span').forEach(bar => {
        const width = bar.style.width;
        bar.style.width = '0';
        setTimeout(() => {
            bar.style.width = width;
        }, 300);
    });
});

// Add hover effects for cards
document.querySelectorAll('.card, .action-card').forEach(card => {
    card.addEventListener('mouseenter', () => {
        card.style.transform = 'translateY(-4px)';
    });
    card.addEventListener('mouseleave', () => {
        card.style.transform = 'translateY(0)';
    });
});