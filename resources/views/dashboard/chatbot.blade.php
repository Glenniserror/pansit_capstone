<!-- ================================================
     CHATBOT PARTIAL — chatbot.html
     Include this snippet inside student_dashboard.html
     before the closing </body> tag.

     For Laravel Blade: @include('chatbot.chatbot')
     ================================================ -->

<!-- Floating Bubble -->
<div id="ai-bubble" class="messenger-bubble">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"
         stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
    </svg>
    <span class="notif-dot"></span>
</div>

<!-- Chat Window -->
<div id="ai-chat-window" class="chat-window-compact">

    <!-- Header -->
    <div class="chat-header">
        <div class="user-info">
            <div class="chat-avatar">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                </svg>
                <span class="online-dot"></span>
            </div>
            <div class="chat-info">
                <span class="chat-name">Math AI Assistant</span>
                <span class="chat-status-text">Online</span>
            </div>
        </div>
        <div class="chat-header-actions">
            <button id="close-chat">&times;</button>
        </div>
    </div>

    <!-- Messages -->
    <div id="chat-content" class="chat-content">
        <div class="chat-divider">Today</div>
        <div class="msg bot">
            <div class="msg-bubble">Hello! Ask me any math questions. 👋</div>
            <div class="quick-replies">
                <button class="quick-reply-btn">📐 Sequences</button>
                <button class="quick-reply-btn">📊 Polynomials</button>
                <button class="quick-reply-btn">🔢 Functions</button>
            </div>
            <span class="msg-time">Just now</span>
        </div>
    </div>

    <!-- Footer -->
    <div class="chat-footer">
        <div class="input-row">
            <input type="text" id="ai-input" placeholder="Type a message...">
            <button id="ai-send-btn">
                <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <line x1="22" y1="2" x2="11" y2="13"></line>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
            </button>
        </div>
        <div class="footer-hint">Press Enter to send</div>
    </div>

</div>