document.addEventListener('DOMContentLoaded', () => {
    /**
     * 1. ZERO STATE COUNTER ANIMATION
     * Kahit 0, magkakaroon pa rin ng "flicker" animation para malaman na live ang data.
     */
    const counters = document.querySelectorAll('.value');
    counters.forEach(counter => {
        const targetText = counter.innerText.replace('%', '');
        const target = parseInt(targetText);
        const isPercent = counter.innerText.includes('%');
        
        let count = 0;
        counter.innerText = isPercent ? "0%" : "0";

        if (target > 0) {
            const updateCount = () => {
                const increment = target / 50;
                if (count < target) {
                    count += increment;
                    counter.innerText = Math.ceil(count) + (isPercent ? '%' : '');
                    setTimeout(updateCount, 20);
                } else {
                    counter.innerText = target + (isPercent ? '%' : '');
                }
            };
            updateCount();
        }
    });

    /**
     * 2. HOVER EFFECTS (Card Lift)
     */
    const interactiveElements = document.querySelectorAll('.stat-card, .action-card, .logout-btn');
    interactiveElements.forEach(el => {
        el.style.transition = 'all 0.3s ease';
        el.addEventListener('mouseenter', () => {
            el.style.transform = 'translateY(-5px)';
            el.style.boxShadow = '0 10px 20px rgba(0,0,0,0.05)';
        });
        el.addEventListener('mouseleave', () => {
            el.style.transform = 'translateY(0)';
            el.style.boxShadow = 'none';
        });
    });

    /**
     * 3. AI BUBBLE TOGGLE
     */
    const bubble = document.getElementById('ai-bubble');
    if(bubble) {
        bubble.addEventListener('click', () => {
            Swal.fire({
                title: 'AI Assistant',
                text: 'How can I help you today, Teacher?',
                input: 'text',
                confirmButtonText: 'Ask'
            });
        });
    }
});