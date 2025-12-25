document.addEventListener('DOMContentLoaded', () => {
    
    // 1. SEARCH FILTER PARA SA MGA ESTUDYANTE
    const searchInput = document.createElement('input');
    searchInput.type = 'text';
    searchInput.placeholder = '🔍 Search student name...';
    searchInput.className = 'search-bar';
    
    // Isasama natin ang search bar sa itaas ng student list
    const studentSection = document.querySelector('.modules-section');
    const studentList = document.querySelector('.student-list');
    studentSection.insertBefore(searchInput, studentList);

    searchInput.addEventListener('keyup', (e) => {
        const term = e.target.value.toLowerCase();
        const students = document.querySelectorAll('.student-row');

        students.forEach(student => {
            const name = student.querySelector('.student-name').textContent.toLowerCase();
            if (name.includes(term)) {
                student.style.display = 'flex';
            } else {
                student.style.display = 'none';
            }
        });
    });

    // 2. NUMBER COUNTER ANIMATION (Para sa Stats)
    const statsValues = document.querySelectorAll('.stat-value');
    
    statsValues.forEach(val => {
        const target = parseInt(val.innerText.replace('%', ''));
        let count = 0;
        const isPercentage = val.innerText.includes('%');
        
        const updateCount = () => {
            const speed = 200 / target;
            if (count < target) {
                count++;
                val.innerText = isPercentage ? `${count}%` : count;
                setTimeout(updateCount, 20);
            }
        };
        updateCount();
    });

    // 3. BUTTON LOADING STATES
    const actionButtons = document.querySelectorAll('.primary-btn, .secondary-btn');

    actionButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const originalHTML = this.innerHTML;
            this.disabled = true;
            this.innerHTML = `<span class="spinner"></span> Processing...`;
            
            // Simulation ng API Call / Action
            setTimeout(() => {
                this.innerHTML = originalHTML;
                this.disabled = false;
                alert('Action completed successfully!');
            }, 1500);
        });
    });

    // 4. STUDENT ROW HOVER EFFECT
    const studentRows = document.querySelectorAll('.student-row');
    studentRows.forEach(row => {
        row.addEventListener('click', () => {
            const name = row.querySelector('.student-name').textContent;
            console.log(`Viewing profile of: ${name}`);
            // Dito mo pwedeng ilagay ang redirect: window.location.href = `/student/${id}`;
        });
    });
});