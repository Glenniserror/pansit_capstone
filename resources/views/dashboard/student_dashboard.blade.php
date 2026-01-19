<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Math Learning Assistant - Student Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite([
    'resources/css/dashboard/student_dashboard.css',
    'resources/js/dashboard/student_dashboard.js'
])

</head>
<body>
     <div class="dashboard-container">
        <header class="header">
            <div class="logo-section">
                <svg class="logo-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                </svg>
                <span class="brand-name">Math Learning Assistant</span>
            </div>
            <form method="POST" action="{{ route('teacher.logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </header>

        <main class="main-content">
            <div class="hero-section">
                <h1 class="welcome-title">Welcome, Student!</h1>
                <p class="welcome-subtitle">Continue your mathematics learning journey</p>
            </div>

            <div class="metrics-grid">
                <div class="metric-card">
                    <div class="metric-header">
                        <span class="metric-label">Overall Progress</span>
                        <svg class="icon green" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                    </div>
                    <h2 class="metric-value">46%</h2>
                    <p class="metric-sub">Across all modules</p>
                </div>

                <div class="metric-card">
                    <div class="metric-header">
                        <span class="metric-label">Quizzes Completed</span>
                        <svg class="icon orange" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"></path><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"></path><path d="M4 22h16"></path><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"></path><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"></path><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"></path></svg>
                    </div>
                    <h2 class="metric-value">12/20</h2>
                    <p class="metric-sub">Keep going!</p>
                </div>

                <div class="metric-card">
                    <div class="metric-header">
                        <span class="metric-label">Current Streak</span>
                        <svg class="icon blue" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                    </div>
                    <h2 class="metric-value">7 days</h2>
                    <p class="metric-sub">Personal best!</p>
                </div>
            </div>

            <section class="modules-container">
                <div class="card-header">
                    <h3>Learning Modules</h3>
                    <p>Track your progress across all topics</p>
                </div>

                <div class="module-item">
                    <div class="module-info">
                        <div class="module-title-row">
                            <span class="status-icon success">✓</span>
                            <span class="module-name">Sequences and Series</span>
                            <span class="percentage">100%</span>
                        </div>
                        <div class="progress-bar-bg">
                            <div class="progress-fill" style="width: 100%;"></div>
                        </div>
                    </div>
                    <button class="view-topics-btn">View Topics</button>
                </div>

                <div class="module-item">
                    <div class="module-info">
                        <div class="module-title-row">
                            <span class="status-icon pending">🕒</span>
                            <span class="module-name">Polynomials and Polynomial Equations</span>
                            <span class="percentage">0%</span>
                        </div>
                        <div class="progress-bar-bg">
                            <div class="progress-fill" style="width: 0%;"></div>
                        </div>
                    </div>
                    <button class="view-topics-btn">View Topics</button>
                </div>

                <div class="module-item">
                    <div class="module-info">
                        <div class="module-title-row">
                            <span class="status-icon pending">🕒</span>
                            <span class="module-name">Advanced Equations and Functions</span>
                            <span class="percentage">0%</span>
                        </div>
                        <div class="progress-bar-bg">
                            <div class="progress-fill" style="width: 0%;"></div>
                        </div>
                    </div>
                    <button class="view-topics-btn">View Topics</button>
                </div>
            </section>

            <div class="bottom-grid">
                <div class="action-card">
                    <div class="icon-box blue-bg">💬</div>
                    <h3>AI Chatbot</h3>
                    <p>Get instant help with your math questions</p>
                    <button id="start-chat-btn" type="button" class="primary-btn">Start Chat</button>
                </div>

                <div class="action-card">
                    <div class="icon-box green-bg">📥</div>
                    <h3>Offline Materials</h3>
                    <p>Download assessment to practice offline</p>
                    <button class="outline-btn">View Downloads</button>
                </div>

                <div class="action-card full-width-mobile">
                    <div class="icon-box blue-bg">📖</div>
                    <h3>Summative Test</h3>
                    <p>Test your knowledge with interactive summative test</p>
                    <button class="primary-btn">Start Summative Test</button>
                </div>
            </div>
        </main>
    </div>

    <!-- Chatbot UI Elements -->
    <div id="ai-bubble" class="messenger-bubble">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
    </div>

    <div id="ai-chat-window" class="chat-window-compact">
        <div class="chat-header">
            <div class="user-info">
                <div class="status-dot"></div>
                <span>Math AI Assistant</span>
            </div>
            <button id="close-chat">&times;</button>
        </div>
        <div id="chat-content" class="chat-content">
            <div class="msg bot">Hello! Ask me any math questions.</div>
        </div>
        <div class="chat-footer">
            <input type="text" id="ai-input" placeholder="Type a message...">
            <button id="ai-send-btn">
                <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
            </button>
        </div>
    </div>


</body>
</html>