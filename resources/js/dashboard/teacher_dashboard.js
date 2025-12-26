document.addEventListener('DOMContentLoaded', () => {
    
    // 1. Counter Animation para sa Metrics
    const counters = document.querySelectorAll('.value');
    
    const animateCounters = () => {
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const isPercentage = counter.innerText.includes('%') || counter.getAttribute('data-target') === "67";
            let count = 0;
            
            // Speed control: mas malaking numero, mas mabilis ang dagdag
            const increment = target / 50; 
            
            const updateCount = () => {
                if (count < target) {
                    count += increment;
                    counter.innerText = isPercentage ? `${Math.ceil(count)}%` : Math.ceil(count);
                    setTimeout(updateCount, 30);
                } else {
                    counter.innerText = isPercentage ? `${target}%` : target;
                }
            };
            updateCount();
        });
    };

    // 2. Intersection Observer para sa Entrance Animation
    // Lalabas lang ang animation kapag scroll-down o pag-load ng page
    const observerOptions = {
        threshold: 0.1
    };

    const revealOnScroll = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                // Staggered effect: dahan-dahang susunod ang bawat card
                setTimeout(() => {
                    entry.target.classList.add('reveal-active');
                }, index * 100);
            }
        });
    }, observerOptions);

    // I-apply ang initial styles at i-observe ang bawat card
    const allCards = document.querySelectorAll('.metric-card, .student-item, .action-card');
    allCards.forEach(card => {
        card.classList.add('reveal-hidden'); // Itatago muna sa CSS
        revealOnScroll.observe(card);
    });

    // Patakbuhin ang counter animation
    animateCounters();

    // 3. Button Click Feedback
    const buttons = document.querySelectorAll('button');
    buttons.forEach(btn => {
        btn.addEventListener('mousedown', function() {
            this.style.transform = 'scale(0.96)';
        });
        btn.addEventListener('mouseup', function() {
            this.style.transform = 'scale(1)';
        });
    });
});