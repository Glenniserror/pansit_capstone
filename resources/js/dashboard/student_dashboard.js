document.addEventListener('DOMContentLoaded', () => {
    // 1. Progress Bar Animation
    // Kumukuha ng progress width mula sa style attribute na nilagay ng Blade
    const progressFills = document.querySelectorAll('.progress-fill');
    
    setTimeout(() => {
        progressFills.forEach(fill => {
            const targetWidth = fill.style.width;
            fill.style.width = '0'; // Reset muna
            setTimeout(() => {
                fill.style.width = targetWidth; // Animate to target
            }, 100);
        });
    }, 500);

    // 2. Button Hover Effects
    const buttons = document.querySelectorAll('button');
    buttons.forEach(btn => {
        btn.addEventListener('mouseenter', () => {
            btn.style.transform = 'translateY(-2px)';
            btn.style.boxShadow = '0 4px 12px rgba(0,0,0,0.05)';
        });
        btn.addEventListener('mouseleave', () => {
            btn.style.transform = 'translateY(0)';
            btn.style.boxShadow = 'none';
        });
    });

    // 3. Simple FAB Interaction
    const fab = document.querySelector('.fab');
    if (fab) {
        fab.addEventListener('click', () => {
            alert('Quick Actions Menu coming soon!');
        });
    }
});