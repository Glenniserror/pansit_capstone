document.addEventListener('DOMContentLoaded', () => {
    /**
     * 1. PROGRESS BAR ANIMATION
     * Kinukuha ang percentage mula sa Blade style attribute at dahan-dahang pinupuno ang bar.
     */
    const progressFills = document.querySelectorAll('.progress-fill');
    
    // Binigyan ng konting delay para makita ng user ang pag-load pagkabukas ng page
    setTimeout(() => {
        progressFills.forEach(fill => {
            const targetWidth = fill.style.width; // Halimbawa: "46%"
            fill.style.width = '0'; // I-reset sa zero muna
            
            // Re-trigger animation pagkatapos ng maikling moment
            setTimeout(() => {
                fill.style.width = targetWidth;
            }, 150);
        });
    }, 400);

    /**
     * 2. VIEW TOPICS BUTTON INTERACTION
     * Dinagdagan natin ng effect kapag clinick ang "View Topics".
     */
    const viewTopicsBtns = document.querySelectorAll('.view-topics-btn');
    viewTopicsBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Konting "loading" feedback para sa user
            const originalText = this.innerText;
            this.innerText = 'Opening...';
            this.style.opacity = '0.7';
            
            setTimeout(() => {
                this.innerText = originalText;
                this.style.opacity = '1';
                // Dito mo pwedeng ilagay ang route link o modal logic
                console.log('Module topics opened!');
            }, 600);
        });
    });

    /**
     * 3. GENERAL BUTTON & CARD HOVER EFFECTS
     * Para sa AI Chatbot, Offline Materials, at Summative Test cards.
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

    /**
     * 4. FAB (FLOATING ACTION BUTTON)
     */
    const fab = document.querySelector('.fab');
    if (fab) {
        fab.addEventListener('click', () => {
            // Pwedeng palitan ito ng menu toggle sa future
            alert('Quick Math Tools: Calculator, Formula Sheet, and Notes coming soon!');
        });
    }
});