<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Learning Assistant - Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    @vite([
        'resources/css/dashboard/admin_dashboard.css',
        'resources/js/dashboard/admin_dashboard.js'
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

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="button" class="logout-btn" id="logout-btn">Logout</button>
            </form>
        </header>

        <main class="content-wrapper">
            <section class="hero">
                <h1>System Administration</h1>
                <p>Manage users, permissions, and platform settings</p>
            </section>

            <div class="metrics-grid">
                <div class="metric-card">
                    <div class="metric-top">
                        <span>Total Users</span>
                        <div class="icon-bg blue-bg">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                    </div>
                    <h2 class="metric-val">0</h2>
                    <p class="metric-sub">+0 this month</p>
                </div>

                <div class="metric-card">
                    <div class="metric-top">
                        <span>Active Students</span>
                        <div class="icon-bg green-bg">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path></svg>
                        </div>
                    </div>
                    <h2 class="metric-val">0</h2>
                    <p class="metric-sub">+0% active</p>
                </div>

                <div class="metric-card">
                    <div class="metric-top">
                        <span>Teachers</span>
                        <div class="icon-bg orange-bg">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                    </div>
                    <h2 class="metric-val">0</h2>
                    <p class="metric-sub">0 new</p>
                </div>

                <div class="metric-card">
                    <div class="metric-top">
                        <span>System Health</span>
                        <div class="icon-bg purple-bg">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                        </div>
                    </div>
                    <h2 class="metric-val">99.9%</h2>
                    <p class="metric-sub">All systems operational</p>
                </div>
            </div>

            <div class="modules-grid">
                <div class="module-card">
                    <div class="banner blue-banner">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                    </div>
                    <h3>User Management</h3>
                    <p>Manage accounts, roles, and permissions</p>
                    <button class="action-btn">Manage Users</button>
                </div>

                <div class="module-card">
                    <div class="banner green-banner">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <h3>Roles & Permissions</h3>
                    <p>Configure access levels and privileges</p>
                    <button class="action-btn">Configure Roles</button>
                </div>

                <div class="module-card">
                    <div class="banner yellow-banner">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    </div>
                    <h3>Analytics</h3>
                    <p>View platform usage and performance metrics</p>
                    <button class="action-btn">View Analytics</button>
                </div>

                <div class="module-card">
                    <div class="banner blue-banner">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                    </div>
                    <h3>Activity Tracking</h3>
                    <p>Monitor active users and engagement</p>
                    <button class="action-btn">Track Activity</button>
                </div>

                <div class="module-card">
                    <div class="banner green-banner">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                    </div>
                    <h3>Content Management</h3>
                    <p>Manage learning modules and materials</p>
                    <button class="action-btn">Manage Content</button>
                </div>

                <div class="module-card">
                    <div class="banner yellow-banner">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    </div>
                    <h3>System Settings</h3>
                    <p>Configure platform preferences and features</p>
                    <button class="action-btn">System Settings</button>
                </div>
            </div>

            <section class="activity-box">
                <h2>Recent System Activity</h2>
                <p class="subtitle">Latest user registrations and system events</p>
                
                <div class="log-list">
                    <div class="log-item">
                        <strong>New Student Registration</strong>
                        <span>Kristine Villamor joined 2 hours ago</span>
                    </div>
                    <div class="log-item">
                        <strong>Teacher Added Module</strong>
                        <span>New content uploaded to Algebra section</span>
                    </div>
                    <div class="log-item">
                        <strong>System Update</strong>
                        <span>Platform updated to v1.1.0</span>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- SweetAlert2 JS Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</body>
</html>
