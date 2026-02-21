// ================================================
// CHATBOT SCRIPT — chatbot.js
// @vite: resources/js/chatbot/chatbot.js
// ================================================

const bubble      = document.getElementById('ai-bubble');
const chatWindow  = document.getElementById('ai-chat-window');
const chatContent = document.getElementById('chat-content');

// ── Helpers ──────────────────────────────────────
function getTime() {
    return new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
}

function openChat() {
    chatWindow.classList.add('open');
    bubble.style.display = 'none';
    setTimeout(() => document.getElementById('ai-input')?.focus(), 300);
    const dot = bubble.querySelector('.notif-dot');
    if (dot) dot.style.display = 'none';
}

function closeWindow() {
    chatWindow.classList.remove('open');
    bubble.style.display = 'flex';
}

// ── Bot Responses ─────────────────────────────────
const botResponses = [
    'I can help you with that math problem!',
    'Great question! Let me break that down step by step.',
    "Let's work through this together. Start by identifying what's given.",
    "Good thinking! Apply the formula systematically and you'll get there.",
    "That's a classic concept — here's how to approach it.",
];

const topicResponses = {
    sequences:   'Sequences follow a pattern! Arithmetic sequences have a constant difference *d*, geometric ones have a ratio *r*. Which type are you working on?',
    polynomials: 'Polynomials are expressions like aₙxⁿ + ... + a₀. Key skills: factoring, long division, and the remainder theorem. What do you need help with?',
    functions:   'Functions map inputs to outputs. Common types: linear, quadratic, polynomial, and exponential. Which one are you studying?',
};

function getBotResponse(text) {
    const lower = text.toLowerCase();
    for (const [key, res] of Object.entries(topicResponses)) {
        if (lower.includes(key)) return res;
    }
    return botResponses[Math.floor(Math.random() * botResponses.length)];
}

// ── Typing Indicator ──────────────────────────────
function showTyping() {
    const t = document.createElement('div');
    t.id        = 'typing-indicator';
    t.className = 'typing-indicator';
    t.innerHTML = `
        <div class="typing-dot"></div>
        <div class="typing-dot"></div>
        <div class="typing-dot"></div>
    `;
    chatContent.appendChild(t);
    chatContent.scrollTop = chatContent.scrollHeight;
}

function removeTyping() {
    document.getElementById('typing-indicator')?.remove();
}

// ── Append Message ────────────────────────────────
function appendMessage(text, type) {
    const msg = document.createElement('div');
    msg.className = `msg ${type}`;

    const bbl = document.createElement('div');
    bbl.className = 'msg-bubble';
    bbl.innerHTML = text.replace(/\*(.*?)\*/g, '<em>$1</em>');

    const time = document.createElement('span');
    time.className   = 'msg-time';
    time.textContent = getTime();

    msg.appendChild(bbl);
    msg.appendChild(time);
    chatContent.appendChild(msg);
    chatContent.scrollTop = chatContent.scrollHeight;
}

// ── Send Message ──────────────────────────────────
function sendMessage(text) {
    const input   = document.getElementById('ai-input');
    const message = text || input?.value.trim();
    if (!message) return;

    appendMessage(message, 'user');
    if (input && !text) input.value = '';

    showTyping();
    setTimeout(() => {
        removeTyping();
        appendMessage(getBotResponse(message), 'bot');
    }, 800 + Math.random() * 500);
}

// ── Event Listeners ───────────────────────────────
bubble.addEventListener('click', openChat);

// "Start Chat" button on the dashboard card
document.getElementById('start-chat-btn')?.addEventListener('click', openChat);

// Delegate events inside the chat window (header close, send btn, quick replies)
chatWindow.addEventListener('click', (e) => {
    if (e.target.closest('#close-chat'))                    closeWindow();
    if (e.target.closest('#ai-send-btn'))                   sendMessage();
    if (e.target.classList.contains('quick-reply-btn')) {
        sendMessage(e.target.textContent.replace(/[^\w\s]/g, '').trim());
    }
});

// Enter key to send
chatWindow.addEventListener('keypress', (e) => {
    if (e.key === 'Enter' && e.target.id === 'ai-input') sendMessage();
});