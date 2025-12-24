document.addEventListener('DOMContentLoaded', () => {

    /**
     * 1. REVEAL ON SCROLL ANIMATION
     * Mag-a-appear ang mga cards pagka-load o pagka-scroll.
     */
    const revealElements = document.querySelectorAll('.reveal');
    
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, { threshold: 0.1 });

    revealElements.forEach(el => revealObserver.observe(el));


    /**
     * 2. GENERAL BUTTON & CARD HOVER EFFECTS
     * Lift effect para sa cards at buttons (Same as Student side).
     */
    const interactiveElements = document.querySelectorAll('.stat-card, .student-item, .action-panel, .btn-primary-blue, .btn-outline-gray, .btn-outline-wide');
    
    interactiveElements.forEach(el => {
        el.addEventListener('mouseenter', () => {
            el.style.transform = 'translateY(-3px)';
            el.style.transition = 'all 0.3s ease';
            if(el.classList.contains('stat-card') || el.classList.contains('action-panel')) {
                el.style.boxShadow = '0 8px 15px rgba(0,0,0,0.08)';
            }
        });

        el.addEventListener('mouseleave', () => {
            el.style.transform = 'translateY(0)';
            el.style.boxShadow = 'none';
        });
    });


    /**
     * 3. ACTION BUTTON INTERACTION (Loading State)
     */
    const actionBtns = document.querySelectorAll('.btn-primary-blue, .btn-outline-gray, .btn-outline-wide');
    
    actionBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const originalText = this.innerText;
            
            // Temporary loading feel
            this.style.opacity = '0.7';
            this.innerText = 'Processing...';
            
            setTimeout(() => {
                this.style.opacity = '1';
                this.innerText = originalText;
                console.log('Action triggered successfully');
            }, 800);
        });
    });


    /**
     * 4. DYNAMIC TREND INDICATOR
     * Automatic color check para sa green trend.
     */
    const trends = document.querySelectorAll('.trend-up');
    trends.forEach(trend => {
        if (trend.innerText.includes('+')) {
            trend.style.color = '#10b981'; // Success Green
        }
    });
});