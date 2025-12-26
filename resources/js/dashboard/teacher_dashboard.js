document.addEventListener('DOMContentLoaded', () => {
    // 1. Animate Numerical Counters
    const animateCounters = () => {
        const counters = document.querySelectorAll('.value');
        counters.forEach(counter => {
            const target = parseInt(counter.innerText.replace('%', ''));
            const isPercentage = counter.innerText.includes('%');
            let count = 0;
            const speed = 2000 / target; // Total animation time: 2 seconds

            const updateCount = () => {
                if (count < target) {
                    count++;
                    counter.innerText = isPercentage ? `${count}%` : count;
                    setTimeout(updateCount, speed);
                } else {
                    counter.innerText = isPercentage ? `${target}%` : target;
                }
            };
            updateCount();
        });
    };

    // 2. Entrance Animations for Cards
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                // Add a slight stagger effect
                setTimeout(() => {
                    entry.target.style.opacity = "1";
                    entry.target.style.transform = "translateY(0)";
                }, index * 100);
            }
        });
    }, observerOptions);

    // Apply initial hidden state and observe
    const cards = document.querySelectorAll('.metric-card, .student-item, .card');
    cards.forEach(card => {
        card.style.opacity = "0";
        card.style.transform = "translateY(20px)";
        card.style.transition = "all 0.6s ease-out";
        observer.observe(card);
    });

    // 3. Button Interaction Feedback
    const buttons = document.querySelectorAll('button');
    buttons.forEach(btn => {
        btn.addEventListener('click', function(e) {
            // Simple Ripple/Scale effect
            this.style.transform = "scale(0.95)";
            setTimeout(() => {
                this.style.transform = "scale(1)";
                if(this.classList.contains('primary-btn')) {
                    alert('Feedback module opening...');
                }
            }, 100);
        });
    });

    // Run counter animation
    animateCounters();
});