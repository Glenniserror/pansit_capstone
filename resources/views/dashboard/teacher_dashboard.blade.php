<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    @vite(['resources/css/dashboard/teacher_dashboard.css', 'resources/js/dashboard/teacher_dashboard.js'])
</head>
<body>
    <div class="dashboard-container">
        <header class="header">
            <div class="logo-section">
                <svg class="logo-icon" viewBox="0 0 24 24" fill="none" stroke="#4A90E2" stroke-width="2">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                </svg>
                <span class="brand-name">Math Assistant <span class="badge-role">Teacher</span></span>
            </div>

            <form action="{{ route('teacher.logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-outline" style="width: auto; cursor: pointer;">
                    Logout
                </button>
            </form>
        </header>

        <main class="content">
            <div class="hero-section">
                <h1 class="welcome-title">Welcome back, Prof. {{ Auth::user()->name ?? 'Teacher' }}!</h1>
                <p class="welcome-subtitle">Monitor and manage your students' mathematical progress</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-label">Total Students</span>
                        <svg class="stat-icon blue" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <div class="stat-value">124</div>
                    <div class="stat-desc">Active learners</div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-label">Avg. Progress</span>
                        <svg class="stat-icon green" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                    </div>
                    <div class="stat-value">67%</div>
                    <div class="stat-desc">+5% from last week</div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-label">Pending Reviews</span>
                        <svg class="stat-icon orange" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="9" y1="9" x2="15" y2="9"></line><line x1="9" y1="13" x2="15" y2="13"></line><line x1="9" y1="17" x2="15" y2="17"></line></svg>
                    </div>
                    <div class="stat-value">18</div>
                    <div class="stat-desc">Quizzes to grade</div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-label">Messages</span>
                        <svg class="stat-icon blue" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    </div>
                    <div class="stat-value">7</div>
                    <div class="stat-desc">Unread inquiries</div>
                </div>
            </div>

            <div class="main-layout">
                <section class="modules-section">
                    <h2 class="section-title">Recent Student Activity</h2>
                    <p class="section-subtitle">Real-time update on student performance</p>

                    <div class="student-list">
                        <div class="student-row">
                            <div class="student-main-info">
                                <div class="avatar">MC</div>
                                <div>
                                    <div class="student-name">Meland Carman</div>
                                    <div class="student-sub">Progress: 78%</div>
                                </div>
                            </div>
                            <span class="status-badge excellent">Excellent</span>
                        </div>

                        <div class="student-row">
                            <div class="student-main-info">
                                <div class="avatar orange">ST</div>
                                <div>
                                    <div class="student-name">Stephanie Tamayuza</div>
                                    <div class="student-sub">Progress: 65%</div>
                                </div>
                            </div>
                            <span class="status-badge good">Good</span>
                        </div>

                        <div class="student-row">
                            <div class="student-main-info">
                                <div class="avatar red">KV</div>
                                <div>
                                    <div class="student-name">Kristine Villamor</div>
                                    <div class="student-sub">Progress: 45%</div>
                                </div>
                            </div>
                            <span class="status-badge help">Needs Help</span>
                        </div>

                        <div class="student-row">
                            <div class="student-main-info">
                                <div class="avatar">RE</div>
                                <div>
                                    <div class="student-name">Rhyssa Embanacido</div>
                                    <div class="student-sub">Progress: 82%</div>
                                </div>
                            </div>
                            <span class="status-badge excellent">Excellent</span>
                        </div>
                    </div>

                    <button class="view-topics-btn">View All Students</button>
                </section>

                <aside class="bottom-grid sidebar-actions">
                    <div class="action-card">
                        <div class="icon-box blue-bg">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#007bff" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        </div>
                        <h3 class="card-title">Provide Feedback</h3>
                        <p class="card-desc">Send personalized recommendations to students</p>
                        <button class="primary-btn">Send Feedback</button>
                    </div>

                    <div class="action-card">
                        <div class="icon-box green-bg">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#28a745" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        </div>
                        <h3 class="card-title">Print Materials</h3>
                        <p class="card-desc">Download modules for offline distribution</p>
                        <button class="secondary-btn">Generate PDFs</button>
                    </div>

                    <div class="action-card">
                        <div class="icon-box blue-bg">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#007bff" stroke-width="2"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                        </div>
                        <h3 class="card-title">Generate Reports</h3>
                        <p class="card-desc">Create detailed performance analytics</p>
                        <button class="secondary-btn">View Reports</button>
                    </div>
                </aside>
            </div>
        </main>
    </div>
</body>
</html>









