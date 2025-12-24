<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Teacher Dashboard</title>
    @vite(['resources/css/dashboard/teacher_dashboard.css', 'resources/js/dashboard/teacher_dashboard.js'])
</head>
<body>
    <div class="dashboard-wrapper">
        <header class="top-navbar">
            <div class="header-left">
                <svg class="nav-logo" viewBox="0 0 24 24" fill="none" stroke="#4A90E2" stroke-width="2">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                </svg>
                <span class="nav-brand">Teacher Dashboard</span>
            </div>

            <form method="POST" action="{{ route('student.logout') }}">
                @csrf 
                <button type="submit" class="header-logout-btn">Logout</button>
            </form>
        </header>

        <main class="main-container">
            <section class="welcome-banner reveal">
                <h1>Welcome, {{ Auth::check() ? Auth::user()->name : 'Teacher' }}</h1>
                <p>Monitor and guide your students' progress</p>
            </section>

            <section class="stats-grid">
                <div class="stat-card reveal">
                    <div class="stat-content">
                        <span class="label">Total Students</span>
                        <h2 class="number">124</h2>
                        <span class="desc">Active learners</span>
                    </div>
                    <div class="stat-icon blue">👥</div>
                </div>
                <div class="stat-card reveal">
                    <div class="stat-content">
                        <span class="label">Average Progress</span>
                        <h2 class="number">67%</h2>
                        <span class="desc trend-up">+5% from last week</span>
                    </div>
                    <div class="stat-icon green">📈</div>
                </div>
                <div class="stat-card reveal">
                    <div class="stat-content">
                        <span class="label">Pending Reviews</span>
                        <h2 class="number">18</h2>
                        <span class="desc">Quizzes to grade</span>
                    </div>
                    <div class="stat-icon orange">📄</div>
                </div>
                <div class="stat-card reveal">
                    <div class="stat-content">
                        <span class="label">Messages</span>
                        <h2 class="number">7</h2>
                        <span class="desc">Unread Messages</span>
                    </div>
                    <div class="stat-icon light-blue">💬</div>
                </div>
            </section>

            <div class="dashboard-main-content">
                <section class="activity-card reveal">
                    <h3 class="card-title">Recent Student Activity</h3>
                    <p class="card-subtitle">Monitor your students' progress</p>

                    <div class="student-list">
                        <div class="student-item">
                            <div class="info">
                                <strong>Meland Carman</strong>
                                <span>Progress: 78%</span>
                            </div>
                            <span class="status-badge excellent">Excellent</span>
                        </div>
                        <div class="student-item">
                            <div class="info">
                                <strong>Stephanie Tamayuza</strong>
                                <span>Progress: 65%</span>
                            </div>
                            <span class="status-badge good">Good</span>
                        </div>
                        <div class="student-item">
                            <div class="info">
                                <strong>Kristine Villamor</strong>
                                <span>Progress: 45%</span>
                            </div>
                            <span class="status-badge help">Needs Help</span>
                        </div>
                    </div>
                    <button class="btn-outline-wide">View All Students</button>
                </section>

                <aside class="actions-column">
                    <div class="action-panel reveal">
                        <h3>Provide Feedback</h3>
                        <p>Send personalized recommendations to students</p>
                        <button class="btn-primary-blue">Send Feedback</button>
                    </div>

                    <div class="action-panel reveal">
                        <h3>Print Materials</h3>
                        <p>Download modules for offline distribution</p>
                        <button class="btn-outline-gray">📥 Generate PDFs</button>
                    </div>

                    <div class="action-panel reveal">
                        <h3>Generate Reports</h3>
                        <p>Create detailed performance reports</p>
                        <button class="btn-outline-gray">📊 View Reports</button>
                    </div>
                </aside>
            </div>
        </main>
    </div>
</body>
</html>