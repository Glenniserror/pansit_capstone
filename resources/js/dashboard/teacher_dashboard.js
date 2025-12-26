document.addEventListener('DOMContentLoaded', () => {
    /**
     * 1. PROGRESS BAR ANIMATION
     * Kinukuha ang percentage mula sa Blade style attribute.
     */
    const progressFills = document.querySelectorAll('.progress-fill');
    
    setTimeout(() => {
        progressFills.forEach(fill => {
            // Kunin ang width na galing sa Blade (halimbawa "0%" o "100%")
            const targetWidth = fill.style.width; 
            
            // I-reset muna para sa animation effect
            fill.style.width = '0'; 
            
            setTimeout(() => {
                fill.style.width = targetWidth;
            }, 150);
        });
    }, 400);

    /**
     * 2. VIEW TOPICS BUTTON INTERACTION (WITH LOCK CHECK)
     */
    const viewTopicsBtns = document.querySelectorAll('.view-topics-btn');
    viewTopicsBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            // 2. Kung hindi locked, ituloy ang loading effect
            const originalText = this.innerText;
            this.innerText = 'Opening...';
            this.style.opacity = '0.7';
            
            setTimeout(() => {
                this.innerText = originalText;
                this.style.opacity = '1';
                console.log('Student details opened!');
                // Dito pwedeng ilagay ang window.location.href = "/student/1";
            }, 600);
        });
    });

    /**
     * 4. GENERAL BUTTON & CARD HOVER EFFECTS
     */
    const interactiveElements = document.querySelectorAll('.action-card, .primary-btn, .secondary-btn, .logout-btn');
    
    interactiveElements.forEach(el => {
        el.addEventListener('mouseenter', () => {
            el.style.transform = 'translateY(-3px)';
            el.style.transition = 'all 0.3s ease';
        });

        el.addEventListener('mouseleave', () => {
            el.style.transform = 'translateY(0)';
        });
    });
});