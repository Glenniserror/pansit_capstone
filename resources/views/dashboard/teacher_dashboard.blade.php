<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Math Learning Assistant - Dashboard</title>
    @vite(['resources/css/dashboard/student_dashboard.css', 'resources/js/dashboard/student_dashboard.js'])
</head>
<body>
    <div class="dashboard-container">
        <header class="header">
            <div class="logo-section">
                <svg class="logo-icon" viewBox="0 0 24 24" fill="none" stroke="#4A90E2" stroke-width="2">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                </svg>
                <span class="brand-name">Teacher Dashboard</span>
            </div>
            <button class="logout-btn">Logout</button>
        </header>

        <main class="content">
            <div class="hero-section">
                <h1 class="welcome-title">Welcome, Teacher</h1>
                <p class="welcome-subtitle">Monitor and guide your students' progress</p>
            </div>

            <div class="metrics-grid">
                <div class="metric-card">
                    <div class="metric-info">
                        <p class="label">Total Students</p>
                        <h2 class="value">124</h2>
                        <p class="sub-label">Active learners</p>
                    </div>
                    <div class="icon blue-icon">👥</div>
                </div>
                <div class="metric-card">
                    <div class="metric-info">
                        <p class="label">Average Progress</p>
                        <h2 class="value">67%</h2>
                        <p class="sub-label positive">+5% from last week</p>
                    </div>
                    <div class="icon green-icon">📈</div>
                </div>
                <div class="metric-card">
                    <div class="metric-info">
                        <p class="label">Pending Reviews</p>
                        <h2 class="value">18</h2>
                        <p class="sub-label">Quizzes to grade</p>
                    </div>
                    <div class="icon orange-icon">📄</div>
                </div>
                <div class="metric-card">
                    <div class="metric-info">
                        <p class="label">Messages</p>
                        <h2 class="value">7</h2>
                        <p class="sub-label">Unread Messages</p>
                    </div>
                    <div class="icon teal-icon">💬</div>
                </div>
            </div>

            <div class="main-grid">
                <section class="activity-section card">
                    <h3 class="section-title">Recent Student Activity</h3>
                    <p class="section-subtitle">Monitor your students' progress</p>
                    
                    <div class="student-list">
                        <div class="student-item">
                            <div class="student-info">
                                <strong>Meland Carman</strong>
                                <span>Progress: 78%</span>
                            </div>
                            <span class="badge excellent">Excellent</span>
                        </div>
                        <div class="student-item">
                            <div class="student-info">
                                <strong>Stephanie Tamayuza</strong>
                                <span>Progress: 65%</span>
                            </div>
                            <span class="badge good">Good</span>
                        </div>
                        <div class="student-item">
                            <div class="student-info">
                                <strong>Kristine Villamor</strong>
                                <span>Progress: 45%</span>
                            </div>
                            <span class="badge needs-help">Needs Help</span>
                        </div>
                        <div class="student-item">
                            <div class="student-info">
                                <strong>Rhyssa Embanacido</strong>
                                <span>Progress: 82%</span>
                            </div>
                            <span class="badge excellent">Excellent</span>
                        </div>
                    </div>
                    <button class="view-all-btn">View All Students</button>
                </section>

                <div class="action-column">
                    <div class="action-card card">
                        <div class="action-content">
                            <h4>Provide Feedback</h4>
                            <p>Send personalized recommendations to students</p>
                            <button class="primary-btn">Send Feedback</button>
                        </div>
                    </div>
                    <div class="action-card card">
                        <div class="action-content">
                            <h4>Print Materials</h4>
                            <p>Download modules for offline distribution</p>
                            <button class="secondary-btn">📄 Generate PDFs</button>
                        </div>
                    </div>
                    <div class="action-card card">
                        <div class="action-content">
                            <h4>Generate Reports</h4>
                            <p>Create detailed performance reports</p>
                            <button class="secondary-btn">📊 View Reports</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>