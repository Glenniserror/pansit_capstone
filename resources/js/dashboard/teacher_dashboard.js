import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                // Staggered effect (sunod-sunod na lilitaw)
                setTimeout(() => {
                    entry.target.classList.add('card-visible');
                }, index * 100);
            }
        });
    }, observerOptions);

    // Apply animation to all cards
    document.querySelectorAll('.card').forEach(card => {
        card.classList.add('card-animate');
        observer.observe(card);
    });

    // Button click animation effect
    document.querySelectorAll('button').forEach(btn => {
        btn.addEventListener('mousedown', () => btn.style.transform = 'scale(0.95)');
        btn.addEventListener('mouseup', () => btn.style.transform = 'scale(1)');
    });
});