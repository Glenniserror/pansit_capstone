/* resources/js/dashboard/teacher_dashboard.js */

document.addEventListener('DOMContentLoaded', () => {
    
    /**
     * 1. COUNTER ANIMATION
     * Pinapatakbo ang mga numero sa metric cards (Total Students, etc.)
     */
    const animateValue = (element, start, end, duration) => {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            
            // Check kung percentage ang kailangan (Average Progress)
            const isPercent = element.innerText.includes('%') || element.dataset.target === "67";
            element.innerHTML = isPercent ? `${value}%` : value;
            
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    };

    // Trigger counters pagka-load ng page
    const counters = document.querySelectorAll('.value');
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        animateValue(counter, 0, target, 1500); // 1.5 seconds duration
    });

    /**
     * 2. REVEAL ON SCROLL / ENTRANCE
     * Nagbibigay ng Fade-in at Slide-up effect sa mga cards
     */
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                // Staggered delay: hindi sabay-sabay lilitaw
                setTimeout(() => {
                    entry.target.classList.add('active');
                }, index * 100);
                revealObserver.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // I-setup ang lahat ng elements na gustong i-animate
    const animatableElements = document.querySelectorAll('.metric-card, .student-item, .action-card');
    
    animatableElements.forEach(el => {
        el.classList.add('reveal-effect'); // Initial hidden state
        revealObserver.observe(el);
    });

    /**
     * 3. BUTTON CLICK FEEDBACK
     * Dinadagdagan ng bounce/scale effect kapag kiniclick ang buttons
     */
    const buttons = document.querySelectorAll('button');
    buttons.forEach(btn => {
        btn.addEventListener('mousedown', () => {
            btn.style.transform = 'scale(0.95)';
        });
        btn.addEventListener('mouseup', () => {
            btn.style.transform = 'scale(1)';
        });
        btn.addEventListener('mouseleave', () => {
            btn.style.transform = 'scale(1)';
        });
    });
});