document.addEventListener('DOMContentLoaded', () => {
    /**
     * 1. RUNNING NUMBERS ANIMATION
     * Kahit 0 ang target, magkakaroon ito ng maikling "flicker" 
     * para magmukhang nag-lo-load ang live data.
     */
    const counters = document.querySelectorAll('.value');
    
    counters.forEach(counter => {
        const originalText = counter.innerText.trim();
        const isPercent = originalText.includes('%');
        const target = parseInt(originalText.replace('%', '')) || 0;
        
        // Initial state
        counter.innerText = isPercent ? "0%" : "0";

        if (target > 0) {
            // Kung may value (e.g. Admin view), mag-a-animate
            let count = 0;
            const duration = 1500; // 1.5 seconds
            const startTime = performance.now();

            const updateCount = (currentTime) => {
                const elapsed = currentTime - startTime;
                const progress = Math.min(elapsed / duration, 1);
                
                // Ease out function para mas smooth
                const currentCount = Math.floor(progress * target);
                counter.innerText = currentCount + (isPercent ? '%' : '');

                if (progress < 1) {
                    requestAnimationFrame(updateCount);
                } else {
                    counter.innerText = target + (isPercent ? '%' : '');
                }
            };
            requestAnimationFrame(updateCount);
        } else {
            // Kung 0, mag-f-flicker lang sandali para sa "Live" feel
            setTimeout(() => {
                counter.style.opacity = "0.5";
                setTimeout(() => {
                    counter.style.opacity = "1";
                    counter.innerText = isPercent ? "0%" : "0";
                }, 150);
            }, 500);
        }
    });

    /**
     * 2. AI BUBBLE ASSISTANT
     * Magbubukas ng SweetAlert popup kapag clinick.
     */
    const aiBubble = document.getElementById('ai-bubble');
    if (aiBubble) {
        aiBubble.addEventListener('click', () => {
            Swal.fire({
                title: 'Bubog NHS AI Assistant',
                text: 'Hello Teacher! How can I help you manage your modules today?',
                icon: 'info',
                input: 'text',
                inputPlaceholder: 'Type your question here...',
                showCancelButton: true,
                confirmButtonText: 'Ask AI',
                confirmButtonColor: '#1E88E5',
                footer: '<a href="#">Need help with student reports?</a>'
            }).then((result) => {
                if (result.isConfirmed && result.value) {
                    Swal.fire('Processing...', 'I am analyzing your request.', 'success');
                }
            });
        });
    }

    /**
     * 3. HOVER & CLICK EFFECTS FOR CARDS
     */
    const cards = document.querySelectorAll('.stat-card, .side-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.borderColor = '#1E88E5';
            card.style.boxShadow = '0 4px 12px rgba(0,0,0,0.1)';
        });
        card.addEventListener('mouseleave', () => {
            card.style.borderColor = '#eeeeee';
            card.style.boxShadow = '0 1px 3px rgba(0,0,0,0.05)';
        });
    });

    /**
     * 4. GENERATE BUTTONS FEEDBACK
     */
    const actionBtns = document.querySelectorAll('.main-action-btn:not(:disabled)');
    actionBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const originalText = this.innerHTML;
            this.innerHTML = '<span class="spinner">⏳</span> Processing...';
            this.style.opacity = '0.7';
            
            setTimeout(() => {
                this.innerHTML = originalText;
                this.style.opacity = '1';
                Swal.fire('Success', 'The document is being generated.', 'success');
            }, 2000);
        });
    });
});