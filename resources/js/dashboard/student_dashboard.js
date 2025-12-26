document.addEventListener('DOMContentLoaded', () => {
    const bubble = document.getElementById('chatBubble');
    const window = document.getElementById('chatWindow');
    const closeBtn = document.getElementById('closeChat');
    const sendBtn = document.getElementById('sendBtn');
    const input = document.getElementById('userInput');
    const messages = document.getElementById('chatMessages');
    const typing = document.getElementById('typing');

    // Toggle Window
    bubble.addEventListener('click', () => {
        window.style.display = 'flex';
        bubble.style.opacity = '0';
        bubble.style.pointerEvents = 'none';
    });

    closeBtn.addEventListener('click', () => {
        window.style.display = 'none';
        bubble.style.opacity = '1';
        bubble.style.pointerEvents = 'auto';
    });

    function addMessage(type, text) {
        const div = document.createElement('div');
        div.className = `msg-bubble ${type}`;
        
        const now = new Date();
        const timeStr = now.getHours() + ":" + now.getMinutes().toString().padStart(2, '0');

        div.innerHTML = `
            <div class="msg-content">${text}</div>
            <span class="msg-time">${timeStr}</span>
        `;
        
        messages.appendChild(div);
        messages.scrollTop = messages.scrollHeight;
    }

    function handleSend() {
        const text = input.value.trim();
        if(!text) return;

        addMessage('user', text);
        input.value = '';

        // Show Typing Indicator
        typing.style.display = 'flex';
        messages.scrollTop = messages.scrollHeight;

        setTimeout(() => {
            typing.style.display = 'none';
            addMessage('bot', "Analyzing your math query... Solution is being generated. 🤖✨");
        }, 1500);
    }

    sendBtn.addEventListener('click', handleSend);
    input.addEventListener('keypress', (e) => { if(e.key === 'Enter') handleSend(); });
});