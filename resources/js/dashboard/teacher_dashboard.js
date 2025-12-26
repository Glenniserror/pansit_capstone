document.addEventListener('DOMContentLoaded', () => {

    /* STAT COUNTER (same logic as student animations) */
    document.querySelectorAll('.stat-value').forEach(el => {
        const target = parseInt(el.dataset.target);
        let count = 0;

        const step = Math.ceil(target / 50);

        const update = () => {
            count += step;
            if (count > target) count = target;

            el.textContent = el.textContent.includes('%')
                ? count + '%'
                : count;

            if (count < target) requestAnimationFrame(update);
        };

        update();
    });

});
