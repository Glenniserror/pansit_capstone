document.addEventListener('DOMContentLoaded', () => {
    // --- 1. SELECTIONS ---
    const bubble = document.getElementById('ai-bubble');
    const chatWindow = document.getElementById('ai-chat-window');
    const startChatBtn = document.getElementById('start-chat-btn');
    const closeBtn = document.getElementById('close-chat');
    const sendBtn = document.getElementById('ai-send-btn');
    const input = document.getElementById('ai-input');
    const chatContent = document.getElementById('chat-content');
    const progressFills = document.querySelectorAll('.progress-fill');

    // --- 2. CHATBOT FUNCTIONS ---

    // Function para buksan ang chat
    const openChat = () => {
        chatWindow.style.display = 'flex';
        if (bubble) bubble.style.display = 'none';
        input.focus(); // Auto-focus sa input box
        chatContent.scrollTop = chatContent.scrollHeight; // Scroll sa pinakababa
    };

    // Function para isara ang chat
    const closeChat = () => {
        chatWindow.style.display = 'none';
        if (bubble) bubble.style.display = 'flex';
    };

    // Function para mag-append ng message sa UI
    const appendMessage = (text, sender) => {
        const msgDiv = document.createElement('div');
        msgDiv.className = `msg ${sender}`;
        msgDiv.textContent = text;
        chatContent.appendChild(msgDiv);
        
        // Auto-scroll pababa
        chatContent.scrollTo({
            top: chatContent.scrollHeight,
            behavior: 'smooth'
        });
    };

    // Main Function para sa pag-send ng message
    const handleSendMessage = () => {
        const message = input.value.trim();
        if (message === '') return;

        // Ipakita ang message ng student
        appendMessage(message, 'user');
        input.value = '';

        // Magpakita ng "Thinking..." animation (simulated)
        setTimeout(() => {
            const botDiv = document.createElement('div');
            botDiv.className = 'msg bot';
            botDiv.textContent = "Solving... 💡";
            chatContent.appendChild(botDiv);
            chatContent.scrollTop = chatContent.scrollHeight;

            // Dito mo pwedeng i-connect ang totoong AI API (halimbawa: OpenAI o Gemini)
            setTimeout(() => {
                botDiv.textContent = "Nakuha ko ang iyong tanong! Paano kita matutulungan sa Math ngayon?";
                chatContent.scrollTop = chatContent.scrollHeight;
            }, 1000);
        }, 500);
    };

    // --- 3. EVENT LISTENERS ---

    // Click events para sa Chat
    if (startChatBtn) startChatBtn.addEventListener('click', openChat);
    if (bubble) bubble.addEventListener('click', openChat);
    if (closeBtn) closeBtn.addEventListener('click', closeChat);
    if (sendBtn) sendBtn.addEventListener('click', handleSendMessage);
    
    // Enter key para mag-send
    input.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            handleSendMessage();
        }
    });

    // --- 4. OTHER UI LOGIC (Progress & Hover) ---

    // Animation para sa Progress Bars
    setTimeout(() => {
        progressFills.forEach(fill => {
            const targetWidth = fill.style.width; 
            fill.style.width = '0'; 
            setTimeout(() => {
                fill.style.width = targetWidth;
                fill.style.transition = 'width 1.2s ease-in-out';
            }, 100);
        });
    }, 300);

    // Hover effect para sa mga Action Cards
    const cards = document.querySelectorAll('.action-card');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.style.transform = 'translateY(-5px)';
            card.style.boxShadow = '0 10px 25px -5px rgba(0, 0, 0, 0.1)';
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = 'translateY(0)';
            card.style.boxShadow = 'none';
        });
    });
});