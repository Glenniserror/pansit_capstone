document.addEventListener('DOMContentLoaded', function() {
    const bubble = document.getElementById('ai-bubble');
    const chatWindow = document.getElementById('ai-chat-window'); // Iniba ang pangalan mula 'window'
    const closeBtn = document.getElementById('close-chat');
    const sendBtn = document.getElementById('ai-send-btn');
    const input = document.getElementById('ai-input');
    const content = document.getElementById('chat-content');
    const startChatBtn = document.getElementById('start-chat-btn'); // Eto yung id na idinagdag natin

    // Function para buksan ang chat
    function openChat() {
        chatWindow.style.display = 'flex';
        bubble.style.display = 'none';
    }

    // Function para isara ang chat
    function closeChat() {
        chatWindow.style.display = 'none';
        bubble.style.display = 'flex';
    }

    // Event Listeners para sa pagbukas at pagsara
    if(startChatBtn) startChatBtn.onclick = openChat;
    if(bubble) bubble.onclick = openChat;
    if(closeBtn) closeBtn.onclick = closeChat;

    // Function para sa pagpapadala ng message
    function sendMessage() {
        const text = input.value.trim();
        if(!text) return;

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
    }

    if(sendBtn) sendBtn.onclick = sendMessage;
    if(input) {
        input.onkeypress = (e) => { if(e.key === 'Enter') sendMessage(); };
    }
});