<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Learning Assistant - Teacher Dashboard</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Dashboard Styles -->
    <link rel="stylesheet" href="teacher_dashboard.css">
</head>
<body>

<div class="app-shell">

    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="logo-icon">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white"
                     stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                </svg>
            </div>
            <span class="brand-name">Math Learning</span>
        </div>

        <nav class="sidebar-nav">
            <button class="sidebar-item active">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                Home
            </button>
            <button class="sidebar-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                    <circle cx="9" cy="7" r="4"/>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                </svg>
                Students
            </button>
            <button class="sidebar-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
                    <polyline points="17 6 23 6 23 12"/>
                </svg>
                Progress
            </button>
            <button class="sidebar-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                </svg>
                Reports
            </button>
            <button class="sidebar-item">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
                Profile
            </button>
        </nav>

        <div class="sidebar-logout">
            <button class="sidebar-logout-btn" id="logout-btn-desktop">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                    <polyline points="16 17 21 12 16 7"/>
                    <line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                Logout
            </button>
        </div>
    </aside>

    <form id="logout-form" method="POST" action="#" style="display: none;"></form>

    <div class="main-wrapper">

        <header class="header">
            <div class="logo-section">
                <div class="logo-icon">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white"
                         stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                    </svg>
                </div>
                <span class="brand-name">Math Learning Assistant</span>
            </div>
            <button class="logout-btn" id="logout-btn-mobile">Logout</button>
        </header>

        <main class="main-content">

            <div class="hero-section">
                <h1 class="welcome-title">Welcome, Teacher! 👋</h1>
                <p class="welcome-subtitle">Monitor and guide your students' learning journey</p>
            </div>

            <div class="metrics-scroll-wrap">
                <div class="metrics-grid">

                    <div class="metric-card">
                        <div class="metric-header">
                            <span class="metric-label">Total Students</span>
                            <div class="icon-container blue-theme">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                                    <circle cx="9" cy="7" r="4"/>
                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                                </svg>
                            </div>
                        </div>
                        <div class="metric-value">0</div>
                        <div class="metric-sub">Active learners</div>
                    </div>

                    <div class="metric-card">
                        <div class="metric-header">
                            <span class="metric-label">Avg. Progress</span>
                            <div class="icon-container green-theme">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
                                    <polyline points="17 6 23 6 23 12"/>
                                </svg>
                            </div>
                        </div>
                        <div class="metric-value">0%</div>
                        <div class="metric-sub">Across all modules</div>
                    </div>

                    <div class="metric-card">
                        <div class="metric-header">
                            <span class="metric-label">Pending Reviews</span>
                            <div class="icon-container orange-theme">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                    <polyline points="14 2 14 8 20 8"/>
                                    <line x1="16" y1="13" x2="8" y2="13"/>
                                    <line x1="16" y1="17" x2="8" y2="17"/>
                                </svg>
                            </div>
                        </div>
                        <div class="metric-value">0</div>
                        <div class="metric-sub">Quizzes to grade</div>
                    </div>

                    <div class="metric-card">
                        <div class="metric-header">
                            <span class="metric-label">Messages</span>
                            <div class="icon-container purple-theme">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="metric-value">0</div>
                        <div class="metric-sub">Unread messages</div>
                    </div>

                </div>
            </div>

            <section class="modules-container">
                <div class="section-label">Recent Student Activity</div>
                <div class="section-sub">Monitor your students' progress</div>

                <div class="student-item">
                    <div class="student-info">
                        <div class="student-avatar">MC</div>
                        <div>
                            <div class="student-name">Meland Carman</div>
                            <div class="student-meta">Progress: 0%</div>
                        </div>
                    </div>
                    <span class="status-badge badge-needs-help">Needs Help</span>
                </div>

                <div class="student-item">
                    <div class="student-info">
                        <div class="student-avatar">ST</div>
                        <div>
                            <div class="student-name">Stephanie Tamayuza</div>
                            <div class="student-meta">Progress: 0%</div>
                        </div>
                    </div>
                    <span class="status-badge badge-needs-help">Needs Help</span>
                </div>

                <div class="student-item">
                    <div class="student-info">
                        <div class="student-avatar">KV</div>
                        <div>
                            <div class="student-name">Kristine Villamor</div>
                            <div class="student-meta">Progress: 0%</div>
                        </div>
                    </div>
                    <span class="status-badge badge-needs-help">Needs Help</span>
                </div>

                <div class="student-item">
                    <div class="student-info">
                        <div class="student-avatar">RE</div>
                        <div>
                            <div class="student-name">Rhyssa Embahancido</div>
                            <div class="student-meta">Progress: 0%</div>
                        </div>
                    </div>
                    <span class="status-badge badge-needs-help">Needs Help</span>
                </div>

                <button class="view-topics-btn">View All Students</button>
            </section>

            <div class="bottom-grid">

                <div class="action-card">
                    <div class="action-icon-wrap blue-theme">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                        </svg>
                    </div>
                    <div class="action-content">
                        <h3>Send Feedback</h3>
                        <p>Give personalized recommendations to students</p>
                        <button class="primary-btn">Send Feedback</button>
                    </div>
                </div>

                <div class="action-card">
                    <div class="action-icon-wrap green-theme">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                            <polyline points="7 10 12 15 17 10"/>
                            <line x1="12" y1="15" x2="12" y2="3"/>
                        </svg>
                    </div>
                    <div class="action-content">
                        <h3>Print Materials</h3>
                        <p>Download modules for offline distribution</p>
                        <button class="outline-btn">Generate PDFs</button>
                    </div>
                </div>

                <div class="action-card">
                    <div class="action-icon-wrap orange-theme">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                        </svg>
                    </div>
                    <div class="action-content">
                        <h3>Generate Reports</h3>
                        <p>Create detailed student performance reports</p>
                        <button class="primary-btn">View Reports</button>
                    </div>
                </div>

                <div class="action-card" style="animation-delay: 0.34s;">
                    <div class="action-icon-wrap purple-theme">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
                            <polyline points="17 6 23 6 23 12"/>
                        </svg>
                    </div>
                    <div class="action-content">
                        <h3>Student Progress</h3>
                        <p>Track and review each student's learning progress</p>
                        <button class="primary-btn">View Progress</button>
                    </div>
                </div>

            </div>

        </main>
    </div>
</div>

<nav class="bottom-nav">
    <button class="nav-item active">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
            <polyline points="9 22 9 12 15 12 15 22"/>
        </svg>
        <span>Home</span>
        <div class="nav-dot"></div>
    </button>
    <button class="nav-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
            <circle cx="9" cy="7" r="4"/>
            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
        </svg>
        <span>Students</span>
    </button>
    <button class="nav-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
            <polyline points="17 6 23 6 23 12"/>
        </svg>
        <span>Progress</span>
    </button>
    <button class="nav-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
            <polyline points="14 2 14 8 20 8"/>
        </svg>
        <span>Reports</span>
    </button>
    <button class="nav-item">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
            <circle cx="12" cy="7" r="4"/>
        </svg>
        <span>Profile</span>
    </button>
</nav>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="teacher_dashboard.js"></script>

</body>
</html>