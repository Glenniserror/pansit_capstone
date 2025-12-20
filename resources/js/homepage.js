// ================= SCROLL REVEAL =================
const revealElements = document.querySelectorAll('.reveal');

const observer = new IntersectionObserver(
    (entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
                observer.unobserve(entry.target); // animate once
            }
        });
    },
    { threshold: 0.15 }
);

revealElements.forEach(el => observer.observe(el));
entries.forEach((entry, index) => {
    if (entry.isIntersecting) {
        entry.target.style.transitionDelay = `${index * 0.12}s`;
        entry.target.classList.add('show');
        observer.unobserve(entry.target);
    }
});
