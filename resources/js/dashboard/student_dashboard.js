document.addEventListener('DOMContentLoaded', () => {
    // Utility: Debounce function to prevent rapid clicks
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    // Utility: Show loading state on button
    function setButtonLoading(button, isLoading, originalText) {
        if (isLoading) {
            button.innerHTML = '<span class="spinner"></span> Loading...';
            button.disabled = true;
            button.classList.add('loading');
        } else {
            button.innerHTML = originalText;
            button.disabled = false;
            button.classList.remove('loading');
        }
    }

    /**
     * 1. PROGRESS BAR ANIMATION (Unchanged, but kept for completeness)
     */
    const progressFills = document.querySelectorAll('.progress-fill');
    setTimeout(() => {
        progressFills.forEach(fill => {
            const targetWidth = fill.style.width;
            fill.style.width = '0';
            setTimeout(() => {
                fill.style.width = targetWidth;
            }, 150);
        });
    }, 400);

    /**
     * 2. VIEW TOPICS BUTTON INTERACTION (Enhanced with loading, tooltip, and accessibility)
     */
    const viewTopicsBtns = document.querySelectorAll('.view-topics-btn');
    viewTopicsBtns.forEach(btn => {
        btn.addEventListener('click', debounce(function(e) {
            if (this.hasAttribute('disabled') || this.closest('.module-locked')) {
                e.preventDefault();
                // Enhanced: Show tooltip instead of alert for better UX
                showTooltip(this, '🔒 Complete the previous module to unlock this one.');
                return;
            }
            const originalText = this.innerHTML;
            setButtonLoading(this, true, originalText);
            setTimeout(() => {
                setButtonLoading(this, false, originalText);
                console.log('Module topics opened!');
                // Simulate navigation: window.location.href = "/topics/1";
            }, 600);
        }, 300)); // Debounce 300ms
    });

    /**
     * 3. LOCKED MODULES ALERT (Replaced with tooltip for smoother UX)
     */
    function showTooltip(element, message) {
        const tooltip = document.createElement('div');
        tooltip.className = 'tooltip';
        tooltip.textContent = message;
        document.body.appendChild(tooltip);
        const rect = element.getBoundingClientRect();
        tooltip.style.left = `${rect.left + rect.width / 2}px`;
        tooltip.style.top = `${rect.top - 30}px`;
        setTimeout(() => tooltip.remove(), 3000); // Auto-remove after 3s
    }

    const lockedModules = document.querySelectorAll('.module-locked');
    lockedModules.forEach(module => {
        module.addEventListener('click', () => {
            showTooltip(module, '🔒 Complete the previous module to unlock this one.');
        });
    });

    /**
     * 4. GENERAL BUTTON & CARD HOVER EFFECTS (Enhanced with focus states and press animation)
     */
    const interactiveElements = document.querySelectorAll('.action-card, .primary-btn, .secondary-btn, .logout-btn');
    interactiveElements.forEach(el => {
        el.addEventListener('mouseenter', () => {
            if (!el.classList.contains('module-locked')) {
                el.style.transform = 'translateY(-3px) scale(1.02)';
                el.style.transition = 'all 0.3s ease';
            }
        });
        el.addEventListener('mouseleave', () => {
            el.style.transform = 'translateY(0) scale(1)';
        });
        el.addEventListener('mousedown', () => {
            el.style.transform = 'translateY(0) scale(0.98)'; // Press effect
        });
        el.addEventListener('mouseup', () => {
            el.style.transform = 'translateY(-3px) scale(1.02)';
        });
        // Accessibility: Focus styles
        el.addEventListener('focus', () => {
            el.style.outline = '2px solid var(--primary-blue)';
        });
        el.addEventListener('blur', () => {
            el.style.outline = 'none';
        });
    });

    /**
     * 5. LOGOUT BUTTON (Enhanced with confirmation dialog)
     */
    const logoutBtn = document.querySelector('.logout-btn');
    if (logoutBtn) {
        logoutBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to log out?')) {
                this.closest('form').submit();
            }
        });
    }

    /**
     * 6. ACTION CARDS (Enhanced with loading for specific buttons)
     */
    const startChatBtn = document.getElementById('start-chat-btn');
    if (startChatBtn) {
        startChatBtn.addEventListener('click', debounce(() => {
            const originalText = startChatBtn.innerHTML;
            setButtonLoading(startChatBtn, true, originalText);
            setTimeout(() => {
                setButtonLoading(startChatBtn, false, originalText);
                // Trigger chat open (handled below)
            }, 500);
        }, 300));
    }

    const summativeBtn = document.querySelector('.action-card .primary-btn'); // Assuming it's the third card
    if (summativeBtn && summativeBtn.textContent.includes('Summative Test')) {
        summativeBtn.addEventListener('click', debounce(() => {
            if (confirm('Start the Summative Test? This may take time.')) {
                const originalText = summativeBtn.innerHTML;
                setButtonLoading(summativeBtn, true, originalText);
                setTimeout(() => {
                    setButtonLoading(summativeBtn, false, originalText);
                    console.log('Summative Test started!');
                }, 1000);
            }
        }, 300));
    }

    /**
     * 7. CHATBOT INTERACTIONS (Enhanced with debouncing and better feedback)
     */
    const bubble = document.getElementById('ai-bubble');
    const chatWindow = document.getElementById('ai-chat-window');
    const closeBtn = document.getElementById('close-chat');
    const sendBtn = document.getElementById('ai-send-btn');
    const input = document.getElementById('ai-input');
    const content = document.getElementById('chat-content');

    function openChat() {
        chatWindow.style.display = 'flex';
        bubble.style.display = 'none';
        content.scrollTop = content.scrollHeight;
    }

    function closeChat() {
        chatWindow.style.display = 'none';
        bubble.style.display = 'flex';
    }

    if (bubble) bubble.addEventListener('click', openChat);
    if (closeBtn) closeBtn.addEventListener('click', closeChat);

    const sendMessage = debounce(() => {
        const text = input.value.trim();
        if (!text) return;

        const userDiv = document.createElement('div');
        userDiv.className = 'msg user';
        userDiv.textContent = text;
        content.appendChild(userDiv);
        input.value = '';
        content.scrollTop = content.scrollHeight;

        setTimeout(() => {
            const botDiv = document.createElement('div');
            botDiv.className = 'msg bot';
            botDiv.textContent = "Solving... 💡";
            content.appendChild(botDiv);
            content.scrollTop = content.scrollHeight;
        }, 600);
    }, 500); // Debounce send to prevent spam

    if (sendBtn) sendBtn.addEventListener('click', sendMessage);
    if (input) input.addEventListener('keypress', (e) => { if (e.key === 'Enter') sendMessage(); });

    /**
     * 8. FAB (If present, unchanged but kept)
     */
    const fab = document.querySelector('.fab');
    if (fab) {
        fab.addEventListener('click', () => {
            alert('Quick Math Tools: Calculator, Formula Sheet, and Notes coming soon!');
        });
    }
    /* =====================================================
   UNIFIED MOUSE MOVE ANIMATION FOR ALL CARDS
   ===================================================== */

document.querySelectorAll('.stat-card, .action-card').forEach(card => {

    card.addEventListener('mousemove', (e) => {
        const rect = card.getBoundingClientRect();
        const x = e.clientX - rect.left;
        const y = e.clientY - rect.top;

        const centerX = rect.width / 2;
        const centerY = rect.height / 2;

        const rotateX = ((y - centerY) / centerY) * -6;
        const rotateY = ((x - centerX) / centerX) * 6;

        card.style.transform = `
            perspective(900px)
            rotateX(${rotateX}deg)
            rotateY(${rotateY}deg)
            translateY(-6px)
        `;

        card.style.setProperty('--x', `${x}px`);
        card.style.setProperty('--y', `${y}px`);
    });

    card.addEventListener('mouseleave', () => {
        card.style.transform = `
            perspective(900px)
            rotateX(0deg)
            rotateY(0deg)
            translateY(0)
        `;
    });

});

});