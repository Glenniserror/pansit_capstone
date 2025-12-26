/* resources/js/dashboard/teacher_dashboard.js */

document.addEventListener('DOMContentLoaded', () => {
    
    /**
     * 1. STATS COUNTER ANIMATION
     * Pag-animate ng mga numero sa Metric Cards (e.g., 124, 67%, 18, 7)
     */
    const animateStats = () => {
        const statValues = document.querySelectorAll('.value');
        statValues.forEach(el => {
            const target = parseInt(el.dataset.target) || parseInt(el.innerText);
            let start = 0;
            const duration = 1500; 
            const increment = target / (duration / 16);
            
            const handle = setInterval(() => {
                start += increment;
                if (start >= target) {
                    clearInterval(handle);
                    start = target;
                }
                // Check kung percentage ang format
                const isPercent = el.innerText.includes('%') || el.dataset.target === "67";
                el.innerText = isPercent ? Math.round(start) + "%" : Math.round(start);
            }, 16);
        });
    };

    /**
     * 2. CHATBOT INTERACTION LOGIC
     * Kapareho ng logic sa Student Dashboard
     */
    const aiBubble = document.getElementById('ai-bubble');
    const chatWindow = document.getElementById('ai-chat-window');
    const closeChat = document.getElementById('close-chat');
    const startChatBtn = document.getElementById('start-chat-btn');
    const aiInput = document.getElementById('ai-input');
    const aiSendBtn = document.getElementById('ai-send-btn');
    const chatContent = document.getElementById('chat-content');

    const toggleChat = () => {
        const isVisible = chatWindow.style.display === 'flex';
        chatWindow.style.display = isVisible ? 'none' : 'flex';
    };

    if (aiBubble) aiBubble.addEventListener('click', toggleChat);
    if (closeChat) closeChat.addEventListener('click', toggleChat);
    if (startChatBtn) startChatBtn.addEventListener('click', toggleChat);

    const sendMessage = () => {
        const text = aiInput.value.trim();
        if (!text) return;

        const userMsg = document.createElement('div');
        userMsg.className = 'msg user';
        userMsg.textContent = text;
        chatContent.appendChild(userMsg);
        
        aiInput.value = '';
        chatContent.scrollTop = chatContent.scrollHeight;

        setTimeout(() => {
            const botMsg = document.createElement('div');
            botMsg.className = 'msg bot';
            botMsg.textContent = "Math AI Assistant: How can I help you with your teacher reports today?";
            chatContent.appendChild(botMsg);
            chatContent.scrollTop = chatContent.scrollHeight;
        }, 800);
    };

    if (aiSendBtn) aiSendBtn.addEventListener('click', sendMessage);
    if (aiInput) {
        aiInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendMessage();
        });
    }

    /**
     * 3. ENTRANCE REVEAL ANIMATION
     */
    const cards = document.querySelectorAll('.metric-card, .student-item, .action-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'all 0.4s ease forwards';
        
        setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, 80 * index);
    });

    // Run counters
    animateStats();
});