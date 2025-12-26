// Animated counter
document.querySelectorAll('.stat-value').forEach(counter => {
    const target = parseInt(counter.dataset.target);
    let count = 0;

    const increment = Math.ceil(target / 40);

    const updateCounter = () => {
        count += increment;
        if (count < target) {
            counter.textContent = counter.classList.contains('percent')
                ? count + '%'
                : count;
            requestAnimationFrame(updateCounter);
        } else {
            counter.textContent = counter.classList.contains('percent')
                ? target + '%'
                : target;
        }
    };

    updateCounter();
});
