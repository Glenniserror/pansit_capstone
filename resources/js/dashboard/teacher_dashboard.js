document.addEventListener('DOMContentLoaded', () => {
    
    /**
     * 1. REVEAL ANIMATION (Intersection Observer)
     * Nagbibigay ng "fade-in up" effect sa mga cards kapag na-scroll o na-load.
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
     * 2. BUTTON LOADING EFFECTS
     * Gaya ng sa student side, magpapalit ang text ng button kapag ni-click.
     */
    const actionButtons = document.querySelectorAll('.btn-primary-blue, .btn-outline-wide, .btn-outline-gray');
    
    actionButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const originalText = this.innerHTML;
            
            // Huwag ituloy kung icon lang ang laman o kung logout
            if (this.classList.contains('header-logout-btn')) return;

            this.style.opacity = '0.7';
            this.style.pointerEvents = 'none';
            
            if (this.innerText.includes('Feedback')) {
                this.innerText = 'Sending...';
            } else if (this.innerText.includes('PDF')) {
                this.innerText = 'Generating...';
            } else {
                this.innerText = 'Loading...';
            }

            // Simulate delay bago bumalik sa dati (o bago mag-redirect)
            setTimeout(() => {
                this.innerHTML = originalText;
                this.style.opacity = '1';
                this.style.pointerEvents = 'auto';
            }, 1000);
        });
    });


    /**
     * 3. CARD & ITEM HOVER INTERACTION
     * Dynamic lift effect para sa mga cards at student list items.
     */
    const interactiveCards = document.querySelectorAll('.stat-card, .student-item, .action-panel');
    
    interactiveCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-5px)';
            card.style.boxShadow = '0 10px 20px rgba(0,0,0,0.05)';
            card.style.transition = 'all 0.3s ease';
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
            card.style.boxShadow = 'none';
        });
    });


    /**
     * 4. STUDENT ROW CLICK ALERT (Optional)
     * Halimbawa ng interaction kapag clinick ang isang student row.
     */
    const studentRows = document.querySelectorAll('.student-item');
    studentRows.forEach(row => {
        row.style.cursor = 'pointer';
        row.addEventListener('click', () => {
            const studentName = row.querySelector('strong').innerText;
            console.log(`Opening profile for: ${studentName}`);
            // Pwede itong palitan ng: window.location.href = `/teacher/student/${id}`;
        });
    });

});