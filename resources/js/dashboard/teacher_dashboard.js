document.addEventListener('DOMContentLoaded', () => {
    
    // 1. STATS COUNTER ANIMATION
    const statsValues = document.querySelectorAll('.stat-value');
    
    statsValues.forEach(val => {
        const target = parseInt(val.getAttribute('data-target'));
        const isPercentage = val.innerText.includes('%') || val.getAttribute('data-target') == "67";
        let count = 0;
        
        const updateCount = () => {
            const increment = target / 50;
            if (count < target) {
                count += increment;
                val.innerText = isPercentage ? `${Math.ceil(count)}%` : Math.ceil(count);
                setTimeout(updateCount, 20);
            } else {
                val.innerText = isPercentage ? `${target}%` : target;
            }
        };
        updateCount();
    });

    // 2. SEARCH FILTER IN STUDENT LIST
    const studentSection = document.querySelector('.modules-section');
    const studentList = document.querySelector('.student-list');
    
    const searchInput = document.createElement('input');
    searchInput.type = 'text';
    searchInput.placeholder = '🔍 Search student by name...';
    searchInput.style.cssText = `
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        font-size: 0.9rem;
        outline: none;
    `;
    
    studentSection.insertBefore(searchInput, studentList);

    searchInput.addEventListener('input', (e) => {
        const term = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('.student-row');

        rows.forEach(row => {
            const name = row.querySelector('.student-name').textContent.toLowerCase();
            row.style.display = name.includes(term) ? 'flex' : 'none';
        });
    });

    // 3. INTERACTIVE BUTTONS
    const actionBtns = document.querySelectorAll('.primary-btn, .secondary-btn');
    actionBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const originalText = this.innerText;
            this.innerText = 'Processing...';
            this.style.opacity = '0.7';
            
            setTimeout(() => {
                this.innerText = originalText;
                this.style.opacity = '1';
                alert('Success: Request processed!');
            }, 1000);
        });
    });
});