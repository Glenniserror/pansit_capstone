const bubble = document.getElementById('ai-bubble');
        const chatWindow = document.getElementById('ai-chat-window');
        const closeChat = document.getElementById('close-chat');
        const startChatBtn = document.getElementById('start-chat-btn');
        const sendBtn = document.getElementById('ai-send-btn');
        const input = document.getElementById('ai-input');
        const chatContent = document.getElementById('chat-content');

        function openChat() {
            chatWindow.classList.add('open');
            bubble.style.display = 'none';
        }

        function closeWindow() {
            chatWindow.classList.remove('open');
            bubble.style.display = 'flex';
        }

        function sendMessage() {
            const text = input.value.trim();
            if (!text) return;

            const userMsg = document.createElement('div');
            userMsg.className = 'msg user';
            userMsg.textContent = text;
            chatContent.appendChild(userMsg);

            input.value = '';
            chatContent.scrollTop = chatContent.scrollHeight;

            setTimeout(() => {
                const botMsg = document.createElement('div');
                botMsg.className = 'msg bot';
                botMsg.textContent = 'I can help you with that math problem!';
                chatContent.appendChild(botMsg);
                chatContent.scrollTop = chatContent.scrollHeight;
            }, 1000);
        }

        bubble.addEventListener('click', openChat);
        startChatBtn.addEventListener('click', openChat);
        closeChat.addEventListener('click', closeWindow);
        sendBtn.addEventListener('click', sendMessage);
        input.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') sendMessage();
        });