<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Math Learning Assistant - Teacher Dashboard</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/dashboard/teacher_dashboard.css'])
</head>
<body>
    <div class="dashboard-wrapper">
        <header class="header">
            <div class="logo-section">
                <svg class="logo-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2.5">
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

        <main class="content-area">
            <div class="hero-section">
                <h1 class="welcome-title">Welcome, {{ Auth::check() ? Auth::user()->name : 'Teacher' }}</h1>
                <p class="welcome-subtitle">Monitor and guide your students' progress</p>
            </div>

            <div class="metrics-grid">
                <div class="metric-card">
                    <div class="metric-info">
                        <p class="label">Total Students</p>
                        <h2 class="value">124</h2>
                        <p class="sub-text">Active learners</p>
                    </div>
                    <div class="metric-icon blue">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-info">
                        <p class="label">Average Progress</p>
                        <h2 class="value">67%</h2>
                        <p class="sub-text"><span class="positive">+5%</span> from last week</p>
                    </div>
                    <div class="metric-icon green">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline></svg>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-info">
                        <p class="label">Pending Reviews</p>
                        <h2 class="value">18</h2>
                        <p class="sub-text">Quizzes to grade</p>
                    </div>
                    <div class="metric-icon orange">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path></svg>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-info">
                        <p class="label">Messages</p>
                        <h2 class="value">7</h2>
                        <p class="sub-text">Unread Messages</p>
                    </div>
                    <div class="metric-icon light-blue">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 1 1-7.6-10.6"></path></svg>
                    </div>
                </div>
            </div>

            <div class="dashboard-layout">
                <section class="card-container">
                    <div class="card-header">
                        <h3>Recent Student Activity</h3>
                        <p>Monitor your students' progress</p>
                    </div>
                    
                    <div class="student-list">
                        <div class="student-item">
                            <div class="student-details">
                                <span class="name">Meland Carman</span>
                                <span class="prog">Progress: 78%</span>
                            </div>
                            <span class="badge blue">Excellent</span>
                        </div>
                        <div class="student-item">
                            <div class="student-details">
                                <span class="name">Stephanie Tamayuza</span>
                                <span class="prog">Progress: 65%</span>
                            </div>
                            <span class="badge green">Good</span>
                        </div>
                        <div class="student-item">
                            <div class="student-details">
                                <span class="name">Kristine Villamor</span>
                                <span class="prog">Progress: 45%</span>
                            </div>
                            <span class="badge red">Needs Help</span>
                        </div>
                        <div class="student-item">
                            <div class="student-details">
                                <span class="name">Rhyssa Embanacido</span>
                                <span class="prog">Progress: 82%</span>
                            </div>
                            <span class="badge blue">Excellent</span>
                        </div>
                    </div>
                    <button class="ghost-btn full-width mt-20">View All Students</button>
                </section>

                <aside class="sidebar-actions">
                    <div class="card-container">
                        <h3>Provide Feedback</h3>
                        <p>Send personalized recommendations to students</p>
                        <button class="primary-btn">Send Feedback</button>
                    </div>

                    <div class="card-container">
                        <h3>Print Materials</h3>
                        <p>Download modules for offline distribution</p>
                        <button class="ghost-btn full-width">📄 Generate PDFs</button>
                    </div>

                    <div class="card-container">
                        <h3>Generate Reports</h3>
                        <p>Create detailed performance reports</p>
                        <button class="ghost-btn full-width">📊 View Reports</button>
                    </div>
                </aside>
            </div>
        </main>
    </div>
</body>
</html>