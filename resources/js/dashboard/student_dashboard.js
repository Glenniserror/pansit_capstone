document.addEventListener('DOMContentLoaded', () => {
    const bubble = document.getElementById('chatBubble');
    const window = document.getElementById('chatWindow');
    const closeBtn = document.getElementById('closeChat');
    const sendBtn = document.getElementById('sendBtn');
    const input = document.getElementById('userInput');
    const messages = document.getElementById('chatMessages');

    // Toggle Chat Window
    bubble.addEventListener('click', () => {
        window.style.display = 'flex';
        bubble.style.transform = 'scale(0) rotate(90deg)';
        bubble.style.opacity = '0';
        setTimeout(() => { bubble.style.visibility = 'hidden'; }, 400);
    });

    closeBtn.addEventListener('click', () => {
        window.style.display = 'none';
        bubble.style.visibility = 'visible';
        bubble.style.transform = 'scale(1) rotate(0deg)';
        bubble.style.opacity = '1';
    });

    // Messaging Function
    function sendMessage() {
        const text = input.value.trim();
        if (text === "") return;

        // User Message UI
        const userDiv = document.createElement('div');
        userDiv.className = 'message user-message';
        userDiv.textContent = text;
        messages.appendChild(userDiv);
        
        input.value = "";
        messages.scrollTop = messages.scrollHeight;

        // Simulate Bot Typing
        setTimeout(() => {
            const botDiv = document.createElement('div');
            botDiv.className = 'message bot-message';
            botDiv.textContent = "Sinusuri ko ang iyong tanong... Hintayin lamang ang sagot.";
            messages.appendChild(botDiv);
            messages.scrollTop = messages.scrollHeight;
        }, 800);
    }

    sendBtn.addEventListener('click', sendMessage);
    input.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') sendMessage();
    });
});