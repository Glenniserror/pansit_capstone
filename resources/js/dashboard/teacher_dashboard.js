/* resources/js/dashboard/teacher_dashboard.js */

document.addEventListener('DOMContentLoaded', () => {
    
    /**
     * 1. METRICS COUNTER ANIMATION
     * Pag-animate ng mga numero (0 to 124, etc.) pag-load ng page.
     */
    const animateValue = (element, start, end, duration) => {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            
            // Check kung kailangan ng percentage (%) sign base sa data-target
            const isPercent = element.innerText.includes('%') || element.dataset.target === "67";
            element.innerHTML = isPercent ? `${value}%` : value;
            
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    };

    // Trigger ang animation sa lahat ng elements na may class na 'value'
    const counters = document.querySelectorAll('.value');
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        if (!isNaN(target)) {
            animateValue(counter, 0, target, 1500); // 1.5 seconds duration
        }
    });

    /**
     * 2. REVEAL ON SCROLL / ENTRANCE
     * Dahan-dahang pag-angat ng mga cards (Reveal Effect).
     */
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                // Staggered delay para hindi sabay-sabay lilitaw ang cards
                setTimeout(() => {
                    entry.target.classList.add('active');
                }, index * 100);
                revealObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // I-apply ang observer sa mga sections na gusto nating i-animate
    const animatableElements = document.querySelectorAll('.metric-card, .student-item, .action-card, .card');
    
    animatableElements.forEach(el => {
        el.classList.add('reveal-effect'); // Siguraduhin na may initial hidden state sa CSS
        revealObserver.observe(el);
    });

    /**
     * 3. BUTTON CLICK FEEDBACK
     * Dinadagdagan ng micro-interaction ang buttons kapag pinipindot.
     */
    const buttons = document.querySelectorAll('button');
    buttons.forEach(btn => {
        btn.addEventListener('mousedown', () => {
            btn.style.transform = 'scale(0.96)';
        });
        btn.addEventListener('mouseup', () => {
            btn.style.transform = 'scale(1)';
        });
        btn.addEventListener('mouseleave', () => {
            btn.style.transform = 'scale(1)';
        });
    });

    /**
     * 4. LOGOUT CONFIRMATION (Optional)
     * Nagpapakita ng simple alert bago mag-logout ang teacher.
     */
    const logoutForm = document.querySelector('form[action*="logout"]');
    if (logoutForm) {
        logoutForm.addEventListener('submit', (e) => {
            const confirmLogout = confirm("Are you sure you want to logout?");
            if (!confirmLogout) {
                e.preventDefault();
            }
        });
    }
});