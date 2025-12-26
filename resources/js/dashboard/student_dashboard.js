document.addEventListener('DOMContentLoaded', () => {
    const bubble = document.getElementById('chatBubble');
    const window = document.getElementById('chatWindow');
    const close = document.getElementById('closeChat');
    const sendBtn = document.getElementById('sendBtn');
    const input = document.getElementById('userInput');
    const messages = document.getElementById('chatMessages');

    // Open/Close Chat
    bubble.addEventListener('click', () => {
        window.style.display = 'flex';
        bubble.style.display = 'none';
    });

    close.addEventListener('click', () => {
        window.style.display = 'none';
        bubble.style.display = 'flex';
    });

    // Send Message Function
    function sendMessage() {
        const text = input.value.trim();
        if (text === "") return;

        // User Message
        const userDiv = document.createElement('div');
        userDiv.className = 'msg user-msg';
        userDiv.textContent = text;
        messages.appendChild(userDiv);

        input.value = "";
        messages.scrollTop = messages.scrollHeight;

        // Simulate Bot Reply
        setTimeout(() => {
            const botDiv = document.createElement('div');
            botDiv.className = 'msg bot-msg';
            botDiv.textContent = "I'm processing your request about: " + text;
            messages.appendChild(botDiv);
            messages.scrollTop = messages.scrollHeight;
        }, 1000);
    }

    sendBtn.addEventListener('click', sendMessage);
    input.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') sendMessage();
    });
});