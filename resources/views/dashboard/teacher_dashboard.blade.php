<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- CSRF Token para sa security at JS requests --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Math Learning Assistant - Teacher Dashboard</title>
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
                <span class="brand-name">Math Learning Assistant</span>
            </div>

            <form method="POST" action="{{ route('teacher.logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </header>

        <main class="content">
            <div class="hero-section">
                <h1 class="welcome-title">Welcome, {{ Auth::check() ? Auth::user()->name : 'Teacher' }}!</h1>
                <p class="welcome-subtitle">Monitor and guide your students' progress</p>
            </div>

            <div class="metrics-grid">
                <div class="metric-card">
                    <div class="metric-info">
                        <p class="label">Total Students</p>
                        <h2 class="value">124</h2>
                        <p class="sub-label">Active learners</p>
                    </div>
                    <div class="icon-circle icon-blue">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-info">
                        <p class="label">Average Progress</p>
                        <h2 class="value">67%</h2>
                        <p class="sub-label positive">+5% from last week</p>
                    </div>
                    <div class="icon-circle icon-green">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline><polyline points="16 7 22 7 22 13"></polyline></svg>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-info">
                        <p class="label">Pending Reviews</p>
                        <h2 class="value">18</h2>
                        <p class="sub-label">Quizzes to grade</p>
                    </div>
                    <div class="icon-circle icon-orange">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><line x1="10" y1="9" x2="8" y2="9"></line></svg>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-info">
                        <p class="label">Messages</p>
                        <h2 class="value">7</h2>
                        <p class="sub-label">Unread Messages</p>
                    </div>
                    <div class="icon-circle icon-teal">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 1 1-7.6-10.6 8.38 8.38 0 0 1 3.8.9L21 3z"></path></svg>
                    </div>
                </div>
            </div>

            <div class="dashboard-layout">
                <section class="activity-section card">
                    <div class="card-header">
                        <h3>Recent Student Activity</h3>
                        <p>Monitor your students' progress</p>
                    </div>
                    
                    <div class="student-list">
                        <div class="student-item">
                            <div class="student-details">
                                <span class="student-name">Meland Carman</span>
                                <span class="student-progress">Progress: 78%</span>
                            </div>
                            <span class="badge excellent">Excellent</span>
                        </div>

                        <div class="student-item">
                            <div class="student-details">
                                <span class="student-name">Stephanie Tamayuza</span>
                                <span class="student-progress">Progress: 65%</span>
                            </div>
                            <span class="badge good">Good</span>
                        </div>

                        <div class="student-item">
                            <div class="student-details">
                                <span class="student-name">Kristine Villamor</span>
                                <span class="student-progress">Progress: 45%</span>
                            </div>
                            <span class="badge help">Needs Help</span>
                        </div>

                        <div class="student-item">
                            <div class="student-details">
                                <span class="student-name">Rhyssa Embanacido</span>
                                <span class="student-progress">Progress: 82%</span>
                            </div>
                            <span class="badge excellent">Excellent</span>
                        </div>
                    </div>

                    <button class="ghost-btn" style="width: 100%; margin-top: 16px;">View All Students</button>
                </section>

                <aside class="sidebar-actions">
                    <div class="action-card card">
                        <div class="icon-box blue-bg">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#007bff" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                        </div>
                        <h4 class="card-title">Provide Feedback</h4>
                        <p class="card-desc">Send personalized recommendations to students</p>
                        <button class="primary-btn">Send Feedback</button>
                    </div>

                    <div class="action-card card">
                        <div class="icon-box green-bg">
                            <svg viewBox="0 0 24 24" fill="none" stroke="#28a745" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                        </div>
                        <h4 class="card-title">Print Materials</h4>
                        <p class="card-desc">Download modules for offline distribution</p>
                        <button class="ghost-btn">📄 Generate PDFs</button>
                    </div>

                    <div class="action-card card">
                        <div class="icon-box blue-bg">
                             <svg viewBox="0 0 24 24" fill="none" stroke="#007bff" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                        </div>
                        <h4 class="card-title">Generate Reports</h4>
                        <p class="card-desc">Create detailed performance reports</p>
                        <button class="ghost-btn">📊 View Reports</button>
                    </div>
                </aside>
            </div>
        </main>
    </div>
</body>
</html>