document.addEventListener('DOMContentLoaded', () => {

    const aiBubble = document.getElementById('ai-bubble');
    const chatWindow = document.getElementById('ai-chat-window');
    const startChatBtn = document.getElementById('start-chat-btn');
    const closeChatBtn = document.getElementById('close-chat');
    const aiInput = document.getElementById('ai-input');
    const sendBtn = document.getElementById('ai-send-btn');
    const chatContent = document.getElementById('chat-content');

    if (!aiBubble || !chatWindow) return;

    let isOpen = false;

    function toggleChat() {
        isOpen = !isOpen;
        chatWindow.classList.toggle('open', isOpen);
        if (isOpen) setTimeout(() => aiInput.focus(), 100);
    }

    aiBubble.addEventListener('click', toggleChat);
    startChatBtn?.addEventListener('click', toggleChat);
    closeChatBtn.addEventListener('click', toggleChat);

    function addMessage(text, type) {
        const div = document.createElement('div');
        div.className = `msg ${type}`;
        div.textContent = text;
        chatContent.appendChild(div);
        chatContent.scrollTop = chatContent.scrollHeight;
    }

    function sendMessage() {
        const text = aiInput.value.trim();
        if (!text) return;

        addMessage(text, 'user');
        aiInput.value = '';

        setTimeout(() => {
            addMessage('I can help you with algebra, calculus, and more 😊', 'bot');
        }, 700);
    }

    sendBtn.addEventListener('click', sendMessage);
    aiInput.addEventListener('keydown', e => {
        if (e.key === 'Enter') sendMessage();
    });
});
