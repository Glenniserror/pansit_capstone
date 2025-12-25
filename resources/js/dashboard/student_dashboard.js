document.addEventListener('DOMContentLoaded', () => {
    /**
     * 1. PROGRESS BAR ANIMATION
     * Kinukuha ang percentage mula sa Blade style attribute.
     */
    const progressFills = document.querySelectorAll('.progress-fill');
    
    setTimeout(() => {
        progressFills.forEach(fill => {
            // Kunin ang width na galing sa Blade (halimbawa "0%" o "100%")
            const targetWidth = fill.style.width; 
            
            // I-reset muna para sa animation effect
            fill.style.width = '0'; 
            
            setTimeout(() => {
                fill.style.width = targetWidth;
            }, 150);
        });
    }, 400);

    /**
     * 2. VIEW TOPICS BUTTON INTERACTION (WITH LOCK CHECK)
     */
    const viewTopicsBtns = document.querySelectorAll('.view-topics-btn');
    viewTopicsBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            // 1. I-check kung locked ang module
            if (this.hasAttribute('disabled') || this.closest('.module-locked')) {
                e.preventDefault();
                return; // Huwag ituloy ang action
            }

            // 2. Kung hindi locked, ituloy ang loading effect
            const originalText = this.innerText;
            this.innerText = 'Opening...';
            this.style.opacity = '0.7';
            
            setTimeout(() => {
                this.innerText = originalText;
                this.style.opacity = '1';
                console.log('Module topics opened!');
                // Dito pwedeng ilagay ang window.location.href = "/topics/1";
            }, 600);
        });
    });

    /**
     * 3. LOCKED MODULES ALERT
     * Kapag clinick ang mismong card na locked, magbibigay ng feedback.
     */
    const lockedModules = document.querySelectorAll('.module-locked');
    lockedModules.forEach(module => {
        module.addEventListener('click', () => {
            alert('🔒 Oops! Kailangan mo munang tapusin ang naunang module para ma-unlock ito.');
        });
    });

    /**
     * 4. GENERAL BUTTON & CARD HOVER EFFECTS
     */
    const interactiveElements = document.querySelectorAll('.action-card, .primary-btn, .secondary-btn, .logout-btn');
    
    interactiveElements.forEach(el => {
        el.addEventListener('mouseenter', () => {
            // Huwag lagyan ng effect kung locked ang action card (kung sakali)
            if (!el.classList.contains('module-locked')) {
                el.style.transform = 'translateY(-3px)';
                el.style.transition = 'all 0.3s ease';
            }
        });

        el.addEventListener('mouseleave', () => {
            el.style.transform = 'translateY(0)';
        });
    });

    /**
     * 5. FAB (FLOATING ACTION BUTTON)
     */
    const fab = document.querySelector('.fab');
    if (fab) {
        fab.addEventListener('click', () => {
            alert('Quick Math Tools: Calculator, Formula Sheet, and Notes coming soon!');
        });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const bubble = document.getElementById('ai-bubble');
    const window = document.getElementById('ai-chat-window');
    const closeBtn = document.getElementById('close-chat');
    const sendBtn = document.getElementById('ai-send-btn');
    const input = document.getElementById('ai-input');
    const content = document.getElementById('chat-content');

    // Open/Close
    bubble.onclick = () => { window.style.display = 'flex'; bubble.style.display = 'none'; };
    closeBtn.onclick = () => { window.style.display = 'none'; bubble.style.display = 'flex'; };

    function sendMessage() {
        const text = input.value.trim();
        if(!text) return;

        // User message
        const userDiv = document.createElement('div');
        userDiv.className = 'msg user';
        userDiv.textContent = text;
        content.appendChild(userDiv);
        
        input.value = '';
        content.scrollTop = content.scrollHeight;

        // Simulate Bot Typing
        setTimeout(() => {
            const botDiv = document.createElement('div');
            botDiv.className = 'msg bot';
            botDiv.textContent = "Solving... 💡";
            content.appendChild(botDiv);
            content.scrollTop = content.scrollHeight;
        }, 600);
    }

    sendBtn.onclick = sendMessage;
    input.onkeypress = (e) => { if(e.key === 'Enter') sendMessage(); };
});

document.addEventListener('DOMContentLoaded', function() {
    // Kunin ang mga elements
    const bubble = document.getElementById('ai-bubble');
    const chatWindow = document.getElementById('ai-chat-window');
    const startChatBtn = document.getElementById('start-chat-btn'); // New button
    const closeBtn = document.getElementById('close-chat');

    // Function para buksan ang chat
    function openChat() {
        chatWindow.style.display = 'flex';
        bubble.style.display = 'none'; // Itago ang floating bubble
        
        // Optional: I-scroll kusa sa pinaka-baba ng messages
        const content = document.getElementById('chat-content');
        content.scrollTop = content.scrollHeight;
    }

    // Function para isara ang chat
    function closeChat() {
        chatWindow.style.display = 'none';
        bubble.style.display = 'flex'; // Ipakita ulit ang bubble
    }

    // Event Listeners
    if (startChatBtn) {
        startChatBtn.addEventListener('click', openChat);
    }
    
    if (bubble) {
        bubble.addEventListener('click', openChat);
    }

    if (closeBtn) {
        closeBtn.addEventListener('click', closeChat);
    }
});