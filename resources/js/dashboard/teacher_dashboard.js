document.addEventListener('DOMContentLoaded', () => {

    /**
     * 1. REVEAL ANIMATION ON SCROLL
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
     * 2. BUTTON INTERACTION & HOVER
     */
    const buttons = document.querySelectorAll('.btn-primary-blue, .btn-outline-gray, .btn-outline-wide');
    buttons.forEach(btn => {
        btn.addEventListener('click', function() {
            const originalText = this.innerText;
            this.style.opacity = '0.7';
            this.innerText = 'Processing...';
            
            setTimeout(() => {
                this.style.opacity = '1';
                this.innerText = originalText;
            }, 800);
        });

        btn.addEventListener('mouseenter', () => {
            btn.style.transform = 'translateY(-2px)';
            btn.style.transition = '0.3s ease';
        });

        btn.addEventListener('mouseleave', () => {
            btn.style.transform = 'translateY(0)';
        });
    });
});