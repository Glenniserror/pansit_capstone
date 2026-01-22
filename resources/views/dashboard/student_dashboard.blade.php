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
            <div class="logo-icon">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                </svg>
            </div>
            <span class="brand-name">Math Learning Assistant</span>
        </div>
        <form method="POST" action="{{ route('student.logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
    </header>

         <main class="main-content">
        <div class="hero-section">
            <h1 class="welcome-title">Welcome back, Student!</h1>
            <p class="welcome-subtitle">Continue your mathematics learning journey</p>
        </div>

        <div class="metrics-grid">
            <div class="metric-card">
                <span class="metric-label">Overall Progress</span>
                <h2 class="metric-value">46%</h2>
            </div>
            <div class="metric-card">
                <span class="metric-label">Quizzes Completed</span>
                <h2 class="metric-value">12/20</h2>
            </div>
            <div class="metric-card">
                <span class="metric-label">Current Streak</span>
                <h2 class="metric-value">7 days</h2>
            </div>
        </div>

        <section class="modules-container">
            <h3>Learning Modules</h3>

            <div class="module-item">
                <span class="module-name">Sequences and Series</span>
                <div class="progress-bar-bg">
                    <div class="progress-fill" style="width:100%"></div>
                </div>
            </div>

            <div class="module-item">
                <span class="module-name">Polynomials</span>
                <div class="progress-bar-bg">
                    <div class="progress-fill blue" style="width:5%"></div>
                </div>
            </div>
        </section>
    </main>
</div>

<!-- Chat Bubble -->
<div id="ai-bubble" class="messenger-bubble">💬</div>

<!-- Chat Window -->
<div id="ai-chat-window" class="chat-window-compact">
    <div class="chat-header">
        <span>Math AI Assistant</span>
        <button id="close-chat">&times;</button>
    </div>
    <div id="chat-content" class="chat-content">
        <div class="msg bot">Hello! Ask me any math questions.</div>
    </div>
    <div class="chat-footer">
        <input type="text" id="ai-input" placeholder="Type a message...">
        <button id="ai-send-btn">➤</button>
    </div>
</div>
</body>
</html>