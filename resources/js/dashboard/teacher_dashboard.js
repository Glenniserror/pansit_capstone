document.addEventListener('DOMContentLoaded', () => {

    /**
     * 1. REVEAL ANIMATION (INTERSECTION OBSERVER)
     * Nag-ti-trigger ng 'active' class kapag lumabas ang card sa screen.
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
     * 2. BUTTON INTERACTION (LOADING EFFECT)
     * Nagbabago ang text ng button kapag pinindot gaya ng sa Student side.
     */
    const actionButtons = document.querySelectorAll('.btn-primary-blue, .btn-outline-wide, .btn-outline-gray');
    
    actionButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            // Huwag lagyan ng effect kung logout button
            if (this.classList.contains('header-logout-btn')) return;

            const originalText = this.innerText;
            this.innerText = 'Opening...';
            this.style.opacity = '0.7';
            
            setTimeout(() => {
                this.innerText = originalText;
                this.style.opacity = '1';
                console.log('Teacher action successful!');
            }, 600);
        });
    });


    /**
     * 3. CARD & ITEM HOVER EFFECTS
     * Lift effect kapag hinover ang mga cards.
     */
    const interactiveCards = document.querySelectorAll('.stat-card, .student-item, .action-panel');
    
    interactiveCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-3px)';
            card.style.transition = 'all 0.3s ease';
            card.style.boxShadow = '0 5px 15px rgba(0,0,0,0.05)';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
            card.style.boxShadow = 'none';
        });
    });


    /**
     * 4. DYNAMIC TREND INDICATOR
     */
    const trends = document.querySelectorAll('.trend-up');
    trends.forEach(trend => {
        if (trend.innerText.includes('+')) {
            trend.style.color = '#10b981'; // Green color for growth
        }
    });

});