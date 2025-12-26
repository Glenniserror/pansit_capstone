document.querySelectorAll('[data-target]').forEach(counter => {
    const target = parseInt(counter.dataset.target);
    let value = 0;

    const update = () => {
        value += Math.ceil(target / 40);
        if (value < target) {
            counter.textContent = counter.textContent.includes('%') ? value + '%' : value;
            requestAnimationFrame(update);
        } else {
            counter.textContent = counter.textContent.includes('%') ? target + '%' : target;
        }
    };

    update();
});
