document.addEventListener('DOMContentLoaded', () => {
    // 1. Search Functionality
    const studentList = document.querySelector('.student-list');
    const searchBar = document.createElement('input');
    searchBar.placeholder = "🔍 Search students...";
    searchBar.className = "search-bar";
    searchBar.style.cssText = "width:100%; padding:10px; border-radius:8px; border:1px solid #e0e0e0; margin-bottom:15px;";
    
    document.querySelector('.modules-section').insertBefore(searchBar, studentList);

    searchBar.addEventListener('input', (e) => {
        const term = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('.student-row');
        
        rows.forEach(row => {
            const name = row.querySelector('.student-name').innerText.toLowerCase();
            row.style.display = name.includes(term) ? 'flex' : 'none';
        });
    });

    // 2. Simple Stat Animation
    const stats = document.querySelectorAll('.stat-value');
    stats.forEach(stat => {
        const target = parseInt(stat.innerText);
        if(!isNaN(target)) {
            let count = 0;
            const update = () => {
                if(count < target) {
                    count += Math.ceil(target/20);
                    stat.innerText = count + (stat.innerText.includes('%') ? '%' : '');
                    setTimeout(update, 30);
                } else {
                    stat.innerText = target + (stat.innerText.includes('%') ? '%' : '');
                }
            }
            update();
        }
    });
});