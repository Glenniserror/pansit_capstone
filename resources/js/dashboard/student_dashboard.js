document.addEventListener('DOMContentLoaded', () => {
    // --- 1. ELEMENT SELECTIONS ---
    const bubble = document.getElementById('ai-bubble');
    const chatWindow = document.getElementById('ai-chat-window');
    const startChatBtn = document.getElementById('start-chat-btn');
    const closeBtn = document.getElementById('close-chat');
    const sendBtn = document.getElementById('ai-send-btn');
    const input = document.getElementById('ai-input');
    const chatContent = document.getElementById('chat-content');
    const progressFills = document.querySelectorAll('.progress-fill');
    const viewTopicsBtns = document.querySelectorAll('.view-topics-btn');

    // --- 2. CHATBOT LOGIC ---

    const openChat = () => {
        chatWindow.style.display = 'flex';
        if (bubble) bubble.style.display = 'none';
        input.focus();
        chatContent.scrollTop = chatContent.scrollHeight;
    };

    const closeChat = () => {
        chatWindow.style.display = 'none';
        if (bubble) bubble.style.display = 'flex';
    };

    const appendMessage = (text, sender) => {
        const msgDiv = document.createElement('div');
        msgDiv.className = `msg ${sender}`;
        msgDiv.textContent = text;
        chatContent.appendChild(msgDiv);
        chatContent.scrollTop = chatContent.scrollHeight;
    };

    const handleSendMessage = () => {
        const message = input.value.trim();
        if (message === '') return;

        // User Side
        appendMessage(message, 'user');
        input.value = '';

        // Simulate Bot Thinking/Typing
        setTimeout(() => {
            appendMessage("Thinking... 💡", 'bot');
            
            // Simulate actual response after a short delay
            setTimeout(() => {
                // You can replace this with an actual API call later
                const lastMsg = chatContent.lastElementChild;
                if (lastMsg && lastMsg.textContent === "Thinking... 💡") {
                    lastMsg.textContent = "I'm here to help with your Math problems! What specific topic are you working on?";
                }
            }, 1000);
        }, 500);
    };

    // Chat Event Listeners
    if (startChatBtn) startChatBtn.addEventListener('click', openChat);
    if (bubble) bubble.addEventListener('click', openChat);
    if (closeBtn) closeBtn.addEventListener('click', closeChat);
    if (sendBtn) sendBtn.addEventListener('click', handleSendMessage);
    
    input.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') handleSendMessage();
    });

    // --- 3. UI ANIMATIONS & PROGRESS ---

    // Animate progress bars on load
    setTimeout(() => {
        progressFills.forEach(fill => {
            const targetWidth = fill.style.width; 
            fill.style.width = '0'; 
            setTimeout(() => {
                fill.style.width = targetWidth;
                fill.style.transition = 'width 1s ease-in-out';
            }, 100);
        });
    }, 300);

    // View Topics Interaction
    viewTopicsBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            if (this.disabled) return;

            const originalText = this.innerText;
            this.innerText = 'Loading...';
            this.style.opacity = '0.7';
            
            setTimeout(() => {
                this.innerText = originalText;
                this.style.opacity = '1';
                // Example: window.location.href = '/modules/topics';
            }, 800);
        });
    });

    // Hover effects for Action Cards
    const actionCards = document.querySelectorAll('.action-card');
    actionCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-5px)';
            card.style.transition = 'transform 0.3s ease';
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
        });
    });
});