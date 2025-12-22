document.addEventListener('DOMContentLoaded', () => {
    // Initialize Feather Icons
    if (typeof feather !== 'undefined') {
        feather.replace();
    }

    // Animate elements on scroll
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const element = entry.target;
                const animationType = element.dataset.animate;
                element.style.animation = `${animationType} 0.8s ease-out forwards`;
                observer.unobserve(element);
            }
        });
    }, observerOptions);

    // Observe elements with data-animate
    document.querySelectorAll('[data-animate]').forEach(el => {
        observer.observe(el);
    });

    // Animate progress bars
    const progressBars = document.querySelectorAll('.progress-bar span');
    progressBars.forEach(bar => {
        const width = bar.dataset.width;
        setTimeout(() => {
            bar.style.width = `${width}%`;
        }, 500); // Delay for staggered effect
    });

    // Add hover effects for cards
    const cards = document.querySelectorAll('.card, .module, .action-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-5px) scale(1.02)';
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0) scale(1)';
        });
    });
});