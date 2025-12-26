document.addEventListener('DOMContentLoaded', () => {
    const chatWidget = document.getElementById('chatbot-widget');
    const closeChatBtn = document.getElementById('close-chat');
    const sendBtn = document.getElementById('send-btn');
    const userInput = document.getElementById('user-input');
    const chatMessages = document.getElementById('chat-messages');
    
    // Hanapin ang button sa loob ng AI Chatbot card
    const startChatBtn = document.querySelector('.action-card:nth-child(1) .primary-btn');

    if (startChatBtn) {
        startChatBtn.addEventListener('click', (e) => {
            e.preventDefault();
            chatWidget.style.display = 'flex';
            userInput.focus();
        });
    }

    if (closeChatBtn) {
        closeChatBtn.addEventListener('click', () => {
            chatWidget.style.display = 'none';
        });
    }

    function sendMessage() {
        const text = userInput.value.trim();
        if (!text) return;

        appendMessage(text, 'user-msg');
        userInput.value = '';

        // Bot Logic
        setTimeout(() => {
            const response = generateResponse(text);
            appendMessage(response, 'bot-msg');
        }, 700);
    }

    function appendMessage(text, className) {
        const msgDiv = document.createElement('div');
        msgDiv.className = `message ${className}`;
        msgDiv.innerText = text;
        chatMessages.appendChild(msgDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function generateResponse(input) {
        const q = input.toLowerCase();
        if (q.includes("sequence")) return "A sequence is an ordered list of numbers. Common types include Arithmetic and Geometric sequences.";
        if (q.includes("polynomial")) return "Polynomials are algebraic expressions like 2x + 5 or x² - 4.";
        if (q.includes("hi") || q.includes("hello")) return "Hello! Ready to learn math today?";
        return "I'm not quite sure about that specific topic, but I can help you with Sequences and Polynomials!";
    }

    if (sendBtn) sendBtn.addEventListener('click', sendMessage);
    if (userInput) {
        userInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendMessage();
        });
    }
});