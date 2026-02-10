<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Math Learning Assistant - Teacher Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    @vite([
        'resources/css/dashboard/teacher_dashboard.css',
        'resources/js/dashboard/teacher_dashboard.js'
    ])
</head>
<body>
    <div class="dashboard-container">
        <header class="header">
            <div class="logo-section">
                <div class="logo-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                    </svg>
                </div>
                <span class="brand-name">Math Learning Assistant</span>
            </div>
            <form method="POST" action="{{ route('teacher.logout') }}">
                @csrf
                <button type="button" class="logout-btn" id="logout-btn">Logout</button>
            </form>
        </header>

        <main class="main-content">
            <div class="hero-section">
                <h1 class="welcome-title">Welcome, Teacher!</h1>
                <p class="welcome-subtitle">Monitor and guide your students' progress</p>
            </div>

            <div class="metrics-grid">
                <div class="metric-card">
                    <div class="metric-header">
                        <span class="metric-label">Total Students</span>
                        <div class="icon-container blue-theme">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="metric-value">0</h2>
                    <p class="metric-sub">Active students</p>
                </div>

                <div class="metric-card">
                    <div class="metric-header">
                        <span class="metric-label">Average Progress</span>
                        <div class="icon-container green-theme">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                        </div>
                    </div>
                    <h2 class="metric-value">0%</h2>
                    <p class="metric-sub">Compared to last week</p>
                </div>

                <div class="metric-card">
                    <div class="metric-header">
                        <span class="metric-label">Pending Reviews</span>
                        <div class="icon-container orange-theme">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                                <polyline points="14 2 14 8 20 8"></polyline>
                                <line x1="16" y1="13" x2="8" y2="13"></line>
                                <line x1="16" y1="17" x2="8" y2="17"></line>
                                <polyline points="10 9 9 9 8 9"></polyline>
                            </svg>
                        </div>
                    </div>
                    <h2 class="metric-value">0</h2>
                    <p class="metric-sub">Quizzes to grade</p>
                </div>

                <div class="metric-card">
                    <div class="metric-header">
                        <span class="metric-label">Messages</span>
                        <div class="icon-container purple-theme">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="metric-value">0</h2>
                    <p class="metric-sub">Unread messages</p>
                </div>
            </div>

            <div class="content-grid">
                <div class="card">
                    <div class="card-header">
                        <h3>Recent Student Activity</h3>
                        <p>Monitor your students' progress</p>
                    </div>

                    <div class="student-item">
                        <div class="student-info">
                            <h3>Meland Carman</h3>
                            <p>Progress: 78%</p>
                        </div>
                        <button class="status-badge badge-excellent">Excellent</button>
                    </div>

                    <div class="student-item">
                        <div class="student-info">
                            <h3>Stephanie Tamayuza</h3>
                            <p>Progress: 85%</p>
                        </div>
                        <button class="status-badge badge-good">Good</button>
                    </div>

                    <div class="student-item">
                        <div class="student-info">
                            <h3>Kristine Villamor</h3>
                            <p>Progress: 45%</p>
                        </div>
                        <button class="status-badge badge-needs-help">Needs Help</button>
                    </div>

                    <div class="student-item">
                        <div class="student-info">
                            <h3>Rhyssa Embahancido</h3>
                            <p>Progress: 82%</p>
                        </div>
                        <button class="status-badge badge-excellent">Excellent</button>
                    </div>

                    <button class="view-all-btn">View All Students</button>
                </div>

                <div class="card">
                    <div class="action-section">
                        <div class="card-header">
                            <h3>Provide Feedback</h3>
                            <p>Give personalized recommendations to students</p>
                        </div>
                        <button class="action-btn primary">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 18px; height: 18px;">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                            </svg>
                            Send Feedback
                        </button>
                    </div>

                    <div class="action-section">
                        <div class="card-header">
                            <h3>Print Materials</h3>
                            <p>Download modules for offline distribution</p>
                        </div>
                        <button class="action-btn secondary">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 18px; height: 18px;">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                <polyline points="7 10 12 15 17 10"></polyline>
                                <line x1="12" y1="15" x2="12" y2="3"></line>
                            </svg>
                            Generate PDFs
                        </button>
                    </div>

                    <div class="action-section">
                        <div class="card-header">
                            <h3>View Analytics</h3>
                            <p>Track comprehensive class and individual performance metrics</p>
                        </div>
                        <button class="action-btn secondary">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 18px; height: 18px;">
                                <line x1="18" y1="20" x2="18" y2="10"></line>
                                <line x1="12" y1="20" x2="12" y2="4"></line>
                                <line x1="6" y1="20" x2="6" y2="14"></line>
                            </svg>
                            View Reports
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <!-- SweetAlert2 JS Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</body>
</html>