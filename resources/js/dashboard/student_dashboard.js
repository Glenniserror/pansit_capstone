// JavaScript for Math Learning Assistant Dashboard - Animations and Chatbot Functionality

document.addEventListener('DOMContentLoaded', function() {
    // Elements
    const aiBubble = document.getElementById('ai-bubble');
    const chatWindow = document.getElementById('ai-chat-window');
    const startChatBtn = document.getElementById('start-chat-btn');
    const closeChatBtn = document.getElementById('close-chat');
    const chatContent = document.getElementById('chat-content');
    const aiInput = document.getElementById('ai-input');
    const sendBtn = document.getElementById('ai-send-btn');

    // Animation variables
    let isChatOpen = false;

    // Function to toggle chat window with animation
    function toggleChat() {
        if (isChatOpen) {
            // Close chat with animation
            chatWindow.style.animation = 'slideDown 0.3s ease';
            setTimeout(() => {
                chatWindow.style.display = 'none';
                isChatOpen = false;
            }, 300);
        } else {
            // Open chat with animation
            chatWindow.style.display = 'flex';
            chatWindow.style.animation = 'slideUp 0.3s ease';
            isChatOpen = true;
            // Focus on input
            setTimeout(() => aiInput.focus(), 300);
        }
    }

    // Event listeners for opening/closing chat
    aiBubble.addEventListener('click', toggleChat);
    startChatBtn.addEventListener('click', toggleChat);
    closeChatBtn.addEventListener('click', toggleChat);

    // Function to add message to chat
    function addMessage(message, isUser = false) {
        const msgDiv = document.createElement('div');
        msgDiv.className = `msg ${isUser ? 'user' : 'bot'}`;
        msgDiv.textContent = message;
        chatContent.appendChild(msgDiv);
        // Scroll to bottom
        chatContent.scrollTop = chatContent.scrollHeight;
    }

    // Function to simulate bot response
    function simulateBotResponse(userMessage) {
        // Simple simulation - in a real app, this would call an API
        let response = "I'm sorry, I didn't understand that. Can you rephrase your math question?";
        
        // Basic math-related responses
        const lowerMsg = userMessage.toLowerCase();
        if (lowerMsg.includes('hello') || lowerMsg.includes('hi')) {
            response = "Hello! How can I help you with your math today?";
        } else if (lowerMsg.includes('what is') && lowerMsg.includes('derivative')) {
            response = "The derivative measures the rate of change. For example, the derivative of x² is 2x.";
        } else if (lowerMsg.includes('solve') && lowerMsg.includes('equation')) {
            response = "Sure! Please provide the equation you'd like me to help solve.";
        } else if (lowerMsg.includes('thank')) {
            response = "You're welcome! Keep learning math!";
        } else if (lowerMsg.includes('bye') || lowerMsg.includes('goodbye')) {
            response = "Goodbye! Feel free to chat again anytime.";
        }
        
        // Delay response for realism
        setTimeout(() => addMessage(response), 1000 + Math.random() * 1000);
    }

    // Function to send message
    function sendMessage() {
        const message = aiInput.value.trim();
        if (message) {
            addMessage(message, true);
            aiInput.value = '';
            simulateBotResponse(message);
        }
    }

    // Event listeners for sending messages
    sendBtn.addEventListener('click', sendMessage);
    aiInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });

    // Additional animations for metric cards (fade in on load)
    const metricCards = document.querySelectorAll('.metric-card');
    metricCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        setTimeout(() => {
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 100);
    });

    // Animation for module items (staggered fade in)
    const moduleItems = document.querySelectorAll('.module-item');
    moduleItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateX(-20px)';
        setTimeout(() => {
            item.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            item.style.opacity = '1';
            item.style.transform = 'translateX(0)';
        }, 500 + index * 100);
    });

    // Animation for action cards (fade in from bottom)
    const actionCards = document.querySelectorAll('.action-card');
    actionCards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        setTimeout(() => {
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, 1000 + index * 100);
    });

    // Bubble floating animation
    function floatBubble() {
        aiBubble.style.transform = 'translateY(-5px)';
        setTimeout(() => {
            aiBubble.style.transform = 'translateY(0)';
        }, 1000);
    }
    setInterval(floatBubble, 3000);

    // Close chat if clicked outside (optional enhancement)
    document.addEventListener('click', function(e) {
        if (!chatWindow.contains(e.target) && !aiBubble.contains(e.target) && isChatOpen) {
            toggleChat();
        }
    });
});