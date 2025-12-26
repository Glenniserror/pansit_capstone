document.addEventListener('DOMContentLoaded', () => {
    const chatBubble = document.getElementById('chatBubble');
    const chatWindow = document.getElementById('chatWindow');
    const closeChat = document.getElementById('closeChat');
    const sendBtn = document.getElementById('sendBtn');
    const userInput = document.getElementById('userInput');
    const chatMessages = document.getElementById('chatMessages');
    
    // Hanapin ang "Start Chat" button sa dashboard
    const dashboardChatBtn = document.querySelector('.primary-btn'); // O gamitin ang ID kung nilagyan mo

    // Function to Open Chat
    function openChat() {
        chatWindow.style.display = 'flex';
        chatBubble.style.display = 'none';
        userInput.focus();
    }

    // Function to Close Chat
    function hideChat() {
        chatWindow.style.display = 'none';
        chatBubble.style.display = 'flex';
    }

    // Event Listeners
    chatBubble.addEventListener('click', openChat);
    closeChat.addEventListener('click', hideChat);
    
    // Connect dashboard button to chat
    if(dashboardChatBtn && dashboardChatBtn.innerText.includes('Chat')) {
        dashboardChatBtn.addEventListener('click', (e) => {
            e.preventDefault();
            openChat();
        });
    }

    function appendMessage(role, text) {
        const group = document.createElement('div');
        group.className = `msg-group ${role}`;
        
        const msg = document.createElement('div');
        msg.className = 'msg';
        msg.textContent = text;
        
        group.appendChild(msg);
        chatMessages.appendChild(group);
        
        // Auto scroll to bottom
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function handleSend() {
        const val = userInput.value.trim();
        if(!val) return;

        appendMessage('user', val);
        userInput.value = '';

        // Fake AI Response
        setTimeout(() => {
            appendMessage('bot', "I'm thinking... Let me solve that math problem for you! 🧠");
        }, 800);
    }

    sendBtn.addEventListener('click', handleSend);
    userInput.addEventListener('keypress', (e) => {
        if(e.key === 'Enter') handleSend();
    });
});