<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Learning Assistant - Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/dashboard/admin_dashboard.css'])
</head>
<body>
    <div class="dashboard-container">
        <header class="header">
            <div class="logo-section">
                <div class="logo-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
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
                <h1 class="welcome-title">System Administration</h1>
                <p class="welcome-subtitle">Manage users, permissions, and platform settings</p>
            </div>

            <div class="metrics-grid">
                <div class="metric-card">
                    <div class="metric-header">
                        <span class="metric-label">Total Users</span>
                        <div class="icon-container blue-theme">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                        </div>
                    </div>
                    <h2 class="metric-value">200</h2>
                    <p class="metric-sub">+12 this month</p>
                </div>

                <div class="metric-card">
                    <div class="metric-header">
                        <span class="metric-label">Active Students</span>
                        <div class="icon-container green-theme">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path></svg>
                        </div>
                    </div>
                    <h2 class="metric-value">107</h2>
                    <p class="metric-sub">+8% active</p>
                </div>

                <div class="metric-card">
                    <div class="metric-header">
                        <span class="metric-label">Teachers</span>
                        <div class="icon-container orange-theme">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                        </div>
                    </div>
                    <h2 class="metric-value">23</h2>
                    <p class="metric-sub">5 new</p>
                </div>

                <div class="metric-card">
                    <div class="metric-header">
                        <span class="metric-label">System Health</span>
                        <div class="icon-container purple-theme">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                        </div>
                    </div>
                    <h2 class="metric-value">99.9%</h2>
                    <p class="metric-sub">All systems operational</p>
                </div>
            </div>

            <div class="modules-grid">
                <div class="module-card">
                    <div class="banner blue-banner">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                    </div>
                    <div class="module-content">
                        <h3>User Management</h3>
                        <p>Manage accounts, roles, and permissions</p>
                        <button class="action-btn">Manage Users</button>
                    </div>
                </div>

                <div class="module-card">
                    <div class="banner green-banner">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <div class="module-content">
                        <h3>Roles & Permissions</h3>
                        <p>Configure access levels and privileges</p>
                        <button class="action-btn">Configure Roles</button>
                    </div>
                </div>

                <div class="module-card">
                    <div class="banner yellow-banner">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    </div>
                    <div class="module-content">
                        <h3>Analytics</h3>
                        <p>View platform usage and performance metrics</p>
                        <button class="action-btn">View Analytics</button>
                    </div>
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
</body>
</html>