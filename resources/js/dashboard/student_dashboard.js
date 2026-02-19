// ─── Enhanced Chatbot JS ────────────────────────────────────────
// Drop-in replacement for the existing chat JS block.
// Works with the updated HTML structure below.

const bubble       = document.getElementById('ai-bubble');
const chatWindow   = document.getElementById('ai-chat-window');
const closeBtn     = document.getElementById('close-chat');
const startChatBtn = document.getElementById('start-chat-btn');
const sendBtn      = document.getElementById('ai-send-btn');
const input        = document.getElementById('ai-input');
const chatContent  = document.getElementById('chat-content');

// ─── Upgrade header HTML ────────────────────────────────────────
document.querySelector('.chat-header .user-info').innerHTML = `
  <div class="chat-avatar">🧮</div>
  <div class="chat-info-text">
    <span class="chat-name">Math AI</span>
    <span class="chat-status"><span class="status-dot"></span>Online — ready to help</span>
  </div>
`;

// ─── Add date divider + quick suggestions on first load ─────────
function initChatContent() {
  chatContent.innerHTML = '';

  // Date divider
  const divider = document.createElement('div');
  divider.className = 'chat-divider';
  divider.innerHTML = '<span>Today</span>';
  chatContent.appendChild(divider);

  // Welcome bot message
  appendBotMessage('Hi there! 👋 I\'m your Math AI assistant. Ask me anything about sequences, polynomials, or equations!');

  // Quick suggestions (injected below the chat content wrapper)
  const footer = document.querySelector('.chat-footer');
  let suggestionsEl = document.getElementById('quick-suggestions');
  if (!suggestionsEl) {
    suggestionsEl = document.createElement('div');
    suggestionsEl.className = 'quick-suggestions';
    suggestionsEl.id = 'quick-suggestions';
    footer.parentNode.insertBefore(suggestionsEl, footer);
  }

  const suggestions = [
    '📐 What is an arithmetic sequence?',
    '✏️ Solve x² + 5x + 6',
    '📊 Explain geometric series',
    '💡 What is a polynomial?',
  ];
  suggestionsEl.innerHTML = suggestions
    .map(s => `<button class="suggestion-chip">${s}</button>`)
    .join('');

  suggestionsEl.querySelectorAll('.suggestion-chip').forEach(chip => {
    chip.addEventListener('click', () => {
      const text = chip.textContent.replace(/^[^\s]+\s/, ''); // strip emoji
      input.value = text;
      sendMessage();
      suggestionsEl.remove();
    });
  });
}

// ─── Open / Close ───────────────────────────────────────────────
function openChat() {
  chatWindow.classList.add('open');
  bubble.style.display = 'none';
  input.focus();
}

function closeWindow() {
  chatWindow.classList.remove('open');
  bubble.style.display = 'flex';
}

// ─── Append helpers ─────────────────────────────────────────────
function appendBotMessage(text) {
  const wrapper = document.createElement('div');
  wrapper.className = 'msg bot';
  wrapper.innerHTML = `
    <div class="bot-icon">🤖</div>
    <div class="bot-bubble">${text}</div>
  `;
  chatContent.appendChild(wrapper);
  chatContent.scrollTop = chatContent.scrollHeight;
}

function appendUserMessage(text) {
  const el = document.createElement('div');
  el.className = 'msg user';
  el.textContent = text;
  chatContent.appendChild(el);
  chatContent.scrollTop = chatContent.scrollHeight;
}

function showTypingIndicator() {
  const wrapper = document.createElement('div');
  wrapper.className = 'msg bot';
  wrapper.id = 'typing-indicator';
  wrapper.innerHTML = `
    <div class="bot-icon">🤖</div>
    <div class="bot-bubble"><div class="typing-dots"><span></span><span></span><span></span></div></div>
  `;
  chatContent.appendChild(wrapper);
  chatContent.scrollTop = chatContent.scrollHeight;
}

function removeTypingIndicator() {
  const el = document.getElementById('typing-indicator');
  if (el) el.remove();
}

// ─── Send Message ───────────────────────────────────────────────
function sendMessage() {
  const text = input.value.trim();
  if (!text) return;

  appendUserMessage(text);
  input.value = '';

  // Remove suggestion chips after first message
  const chips = document.getElementById('quick-suggestions');
  if (chips) chips.remove();

  showTypingIndicator();

  // Simulated bot reply (swap with real API call)
  setTimeout(() => {
    removeTypingIndicator();
    const replies = [
      'Great question! Let me break that down for you step by step. 🔢',
      'Sure! This is a core concept — here\'s how it works...',
      'Let\'s solve this together. First, identify the key values...',
      'Excellent! That topic is covered in your module. Here\'s a quick summary...',
    ];
    const reply = replies[Math.floor(Math.random() * replies.length)];
    appendBotMessage(reply);
  }, 1200 + Math.random() * 400);
}

// ─── Event Listeners ────────────────────────────────────────────
bubble.addEventListener('click', openChat);
if (startChatBtn) startChatBtn.addEventListener('click', openChat);
closeBtn.addEventListener('click', closeWindow);
sendBtn.addEventListener('click', sendMessage);
input.addEventListener('keypress', e => { if (e.key === 'Enter') sendMessage(); });

// Init content on load
initChatContent();

// ─── Logout Handler ────────────────────────────────
const logoutBtn = document.getElementById('logout-btn');
if (logoutBtn) {
  logoutBtn.addEventListener('click', function() {
    Swal.fire({
      title: 'Are you sure?',
      text: 'You will be logged out of your account.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#6c63ff',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, logout!',
      cancelButtonText: 'Cancel',
    }).then(result => {
      if (result.isConfirmed) document.querySelector('form').submit();
    });
  });
}