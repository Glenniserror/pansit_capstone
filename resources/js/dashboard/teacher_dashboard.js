document.addEventListener('DOMContentLoaded', () => {

    /**
     * 1. HOVER LIFT ANIMATION
     * In-apply sa lahat ng cards para magmukhang interactive.
     */
    const interactiveCards = document.querySelectorAll('.stat-card, .action-card, .logout-btn, .student-item');

    interactiveCards.forEach(card => {
        card.style.transition = "all 0.3s ease";
        
        card.addEventListener('mouseenter', () => {
            card.style.transform = "translateY(-5px)";
            card.style.boxShadow = "0 10px 20px rgba(0,0,0,0.08)";
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = "translateY(0)";
            card.style.boxShadow = "none";
        });
    });

    /**
     * 2. LOADING STATE ANIMATION
     * Kapag clinick ang buttons, magpapalit ng text temporary.
     */
    const mainBtns = document.querySelectorAll('.main-action-btn, .view-all-btn');

    mainBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const originalText = this.innerText;
            this.innerText = "Loading...";
            this.style.opacity = "0.7";
            this.style.pointerEvents = "none";

            setTimeout(() => {
                this.innerText = originalText;
                this.style.opacity = "1";
                this.style.pointerEvents = "auto";
            }, 800);
        });
    });

    /**
     * 3. FLOATING CHAT ASSISTANT LOGIC
     */
    const bubble = document.getElementById('ai-bubble');
    const chatWindow = document.getElementById('ai-chat-window');
    const closeBtn = document.getElementById('close-chat');
    const sendBtn = document.getElementById('ai-send-btn');
    const input = document.getElementById('ai-input');
    const content = document.getElementById('chat-content');

    if (bubble) {
        bubble.addEventListener('click', () => {
            chatWindow.style.display = 'flex';
            bubble.style.display = 'none';
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', () => {
            chatWindow.style.display = 'none';
            bubble.style.display = 'flex';
        });
    }

    function sendMessage() {
        const text = input.value.trim();
        if (!text) return;

        // User Message
        const userDiv = document.createElement('div');
        userDiv.className = 'msg user';
        userDiv.textContent = text;
        content.appendChild(userDiv);
        
        input.value = '';
        content.scrollTop = content.scrollHeight;

        // Bot Response Simulation
        setTimeout(() => {
            const botDiv = document.createElement('div');
            botDiv.className = 'msg bot';
            botDiv.textContent = "I'm checking the data for you... 📊";
            content.appendChild(botDiv);
            content.scrollTop = content.scrollHeight;
        }, 1000);
    }

    if (sendBtn) sendBtn.addEventListener('click', sendMessage);
    if (input) {
        input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendMessage();
        });
    }
});