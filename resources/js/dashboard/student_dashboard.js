document.addEventListener('DOMContentLoaded', function() {
    // 1. SELECT ELEMENTS
    const bubble = document.getElementById('ai-bubble');
    const chatWindow = document.getElementById('ai-chat-window');
    const startChatBtn = document.getElementById('start-chat-btn');
    const closeBtn = document.getElementById('close-chat');
    const sendBtn = document.getElementById('ai-send-btn');
    const input = document.getElementById('ai-input');
    const chatContent = document.getElementById('chat-content');

    // 2. TOGGLE FUNCTIONS (Buksan at Isara)
    function openChat() {
        if (chatWindow) {
            chatWindow.style.display = 'flex';
            if (bubble) bubble.style.display = 'none';
            input.focus();
            chatContent.scrollTop = chatContent.scrollHeight;
        }
    }

    function closeChat() {
        if (chatWindow) {
            chatWindow.style.display = 'none';
            if (bubble) bubble.style.display = 'flex';
        }
    }

    // 3. SEND MESSAGE LOGIC
    function sendMessage() {
        const text = input.value.trim();
        if (!text) return;

        // User message bubble
        const userDiv = document.createElement('div');
        userDiv.className = 'msg user';
        userDiv.textContent = text;
        chatContent.appendChild(userDiv);
        
        input.value = '';
        chatContent.scrollTop = chatContent.scrollHeight;

        // Bot simulation
        setTimeout(() => {
            const botDiv = document.createElement('div');
            botDiv.className = 'msg bot';
            botDiv.textContent = "Solving... 💡";
            chatContent.appendChild(botDiv);
            chatContent.scrollTop = chatContent.scrollHeight;

            // Optional: Palitan ang message pagkatapos ng 1 segundo
            setTimeout(() => {
                botDiv.textContent = "I'm analyzing your math problem. Can you provide more details?";
                chatContent.scrollTop = chatContent.scrollHeight;
            }, 1000);
        }, 600);
    }

    // 4. EVENT LISTENERS
    // Para sa "Start Chat" button sa dashboard card
    if (startChatBtn) {
        startChatBtn.onclick = function(e) {
            e.preventDefault(); // Iwasan ang page reload
            openChat();
        };
    }

    // Para sa Floating Bubble
    if (bubble) {
        bubble.onclick = openChat;
    }

    // Para sa X (Close) button
    if (closeBtn) {
        closeBtn.onclick = closeChat;
    }

    // Para sa Send button
    if (sendBtn) {
        sendBtn.onclick = sendMessage;
    }

    // Para sa Enter key
    if (input) {
        input.onkeypress = function(e) {
            if (e.key === 'Enter') sendMessage();
        };
    }

    // 5. PROGRESS BAR ANIMATION (Bonus)
    const progressFills = document.querySelectorAll('.progress-fill');
    setTimeout(() => {
        progressFills.forEach(fill => {
            const targetWidth = fill.style.width; 
            fill.style.width = '0'; 
            setTimeout(() => {
                fill.style.width = targetWidth;
                fill.style.transition = 'width 1s ease-in-out';
            }, 100);
        });
    }, 500);
});