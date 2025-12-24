<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard | Bubog NHS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/dashboard.css', 'resources/js/dashboard.js'])
</head>
<body>

<nav class="navbar">
    <div class="nav-left">
        <img src="{{ asset('image/logo-removebg-preview.png') }}" alt="Logo" class="nav-logo">
        <span class="brand-name">Teacher Dashboard</span>
    </div>
    <button class="logout-btn">Logout</button>
</nav>

<main class="dashboard-container">
    <header class="welcome-header">
        <h1>Welcome, Teacher</h1>
        <p>Monitor and guide your students' progress</p>
    </header>

    <section class="stats-grid">
        <div class="stat-card">
            <div class="stat-info">
                <span class="label">Total Students</span>
                <h2 class="value">124</h2>
                <span class="sub-text">Active learners</span>
            </div>
            <div class="stat-icon">👤</div>
        </div>
        <div class="stat-card">
            <div class="stat-info">
                <span class="label">Average Progress</span>
                <h2 class="value">67%</h2>
                <span class="trend">+5% from last week</span>
            </div>
            <div class="stat-icon">📈</div>
        </div>
        <div class="stat-card">
            <div class="stat-info">
                <span class="label">Pending Reviews</span>
                <h2 class="value">18</h2>
                <span class="sub-text">Quizzes to grade</span>
            </div>
            <div class="stat-icon">📄</div>
        </div>
        <div class="stat-card">
            <div class="stat-info">
                <span class="label">Messages</span>
                <h2 class="value">7</h2>
                <span class="sub-text">Unread Messages</span>
            </div>
            <div class="stat-icon">💬</div>
        </div>
    </section>

    <div class="content-layout">
        <section class="activity-section card-container">
            <div class="section-header">
                <h3>Recent Student Activity</h3>
                <p>Monitor your students' progress</p>
            </div>
            
            <div class="activity-list">
                <div class="student-item action-card">
                    <div class="student-info">
                        <h4>Meland Carman</h4>
                        <span>Progress: 78%</span>
                    </div>
                    <span class="badge excellent">Excellent</span>
                </div>
                <div class="student-item action-card">
                    <div class="student-info">
                        <h4>Stephanie Tamayuza</h4>
                        <span>Progress: 65%</span>
                    </div>
                    <span class="badge good">Good</span>
                </div>
                <div class="student-item action-card">
                    <div class="student-info">
                        <h4>Kristine Villamor</h4>
                        <span>Progress: 45%</span>
                    </div>
                    <span class="badge help">Needs Help</span>
                </div>
                <div class="student-item action-card">
                    <div class="student-info">
                        <h4>Rhyssa Embanacido</h4>
                        <span>Progress: 82%</span>
                    </div>
                    <span class="badge excellent">Excellent</span>
                </div>
            </div>
            <button class="view-all-btn secondary-btn">View All Students</button>
        </section>

        <aside class="actions-column">
            <div class="action-card side-card">
                <h3>Provide Feedback</h3>
                <p>Send personalized recommendations to students</p>
                <button class="btn-primary main-action-btn">Send Feedback</button>
            </div>

            <div class="action-card side-card">
                <h3>Print Materials</h3>
                <p>Download modules for offline distribution</p>
                <button class="btn-outline main-action-btn">Generate PDFs</button>
            </div>

            <div class="action-card side-card">
                <h3>Generate Reports</h3>
                <p>Create detailed performance reports</p>
                <button class="btn-outline main-action-btn">View Reports</button>
            </div>
        </aside>
    </div>
</main>

<div id="ai-bubble" class="fab">💬</div>

<div id="ai-chat-window" class="chat-window" style="display: none;">
    <div class="chat-header">
        <span>Assistant</span>
        <button id="close-chat">×</button>
    </div>
    <div id="chat-content" class="chat-content">
        <div class="msg bot">Hello Teacher! How can I help you today?</div>
    </div>
    <div class="chat-input-area">
        <input type="text" id="ai-input" placeholder="Type a message...">
        <button id="ai-send-btn">Send</button>
    </div>
</div>

</body>
</html>