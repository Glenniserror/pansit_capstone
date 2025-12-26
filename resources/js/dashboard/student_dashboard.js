<script>
// Balutin natin sa function para sigurado
window.addEventListener('load', function() {
    
    // 1. Kunin ang mga kailangan
    const bubble = document.getElementById('ai-bubble');
    const windowChat = document.getElementById('ai-chat-window');
    const startBtn = document.getElementById('start-chat-btn');
    const closeBtn = document.getElementById('close-chat');
    const sendBtn = document.getElementById('ai-send-btn');
    const input = document.getElementById('ai-input');
    const content = document.getElementById('chat-content');

    // 2. Debugging: I-check natin sa Console (F12) kung nahanap ba ang mga elements
    if (!bubble || !windowChat || !startBtn) {
        console.error("May kulang na ID sa HTML mo! Pakicheck kung tama ang spelling ng 'ai-bubble', 'ai-chat-window', o 'start-chat-btn'.");
        return;
    }

    // 3. Open Function
    function open() {
        windowChat.style.display = 'flex';
        bubble.style.display = 'none';
        input.focus();
    }

    // 4. Close Function
    function close() {
        windowChat.style.display = 'none';
        bubble.style.display = 'flex';
    }

    // 5. Send Function
    function send() {
        const msg = input.value.trim();
        if(!msg) return;

        const userDiv = document.createElement('div');
        userDiv.className = 'msg user';
        userDiv.textContent = msg;
        content.appendChild(userDiv);
        
        input.value = '';
        content.scrollTop = content.scrollHeight;

        setTimeout(() => {
            const botDiv = document.createElement('div');
            botDiv.className = 'msg bot';
            botDiv.textContent = "Solving... 💡";
            content.appendChild(botDiv);
            content.scrollTop = content.scrollHeight;
        }, 500);
    }

    // 6. Click Events
    bubble.onclick = open;
    startBtn.onclick = open;
    closeBtn.onclick = close;
    sendBtn.onclick = send;

    // Enter Key
    input.onkeydown = function(e) {
        if(e.key === 'Enter') send();
    };

    console.log("Chatbot logic is ready!");
});
</script>