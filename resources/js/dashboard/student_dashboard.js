window.addEventListener('load', () => {
    document.querySelectorAll('.progress-bar span').forEach(bar => {
        const width = bar.style.width;
        bar.style.width = '0';
        setTimeout(() => bar.style.width = width, 300);
    });
});
