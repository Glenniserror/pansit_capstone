<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Math Learning Assistant - Student Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite([
    'resources/css/dashboard/admin_dashboard.css',
    'resources/js/dashboard/admin_dashboard.js'
])
</head>
<body>
    <header class="navbar">
        <div class="logo">
            <span class="logo-icon">📖</span>
            <strong>Admin Dashboard</strong>
        </div>
        <button class="logout-btn">Logout</button>
    </header>

    <main class="container">
        <section class="intro">
            <h1>System Administration</h1>
            <p>Manage users, permissions, and platform settings</p>
        </section>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <span>Total Users</span>
                    <span class="icon blue-icon">👥</span>
                </div>
                <div class="stat-value">200</div>
                <div class="stat-sub">+12 this week</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <span>Active Students</span>
                    <span class="icon green-icon">📖</span>
                </div>
                <div class="stat-value">107</div>
                <div class="stat-sub">54% of total</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <span>Teachers</span>
                    <span class="icon orange-icon">👤</span>
                </div>
                <div class="stat-value">23</div>
                <div class="stat-sub">All active</div>
            </div>
            <div class="stat-card">
                <div class="stat-header">
                    <span>System Health</span>
                    <span class="icon blue-light-icon">📈</span>
                </div>
                <div class="stat-value">99.9%</div>
                <div class="stat-sub">Uptime</div>
            </div>
        </div>

        <div class="management-grid">
            <div class="manage-card">
                <div class="card-banner blue-bg">👥</div>
                <h3>User Management</h3>
                <p>Manage account, roles, and permissions</p>
                <button class="action-btn">Manage Users</button>
            </div>
            <div class="manage-card">
                <div class="card-banner green-bg">🛡️</div>
                <h3>Roles & Permissions</h3>
                <p>Configure access levels and privileges</p>
                <button class="action-btn">Configure Roles</button>
            </div>
            <div class="manage-card">
                <div class="card-banner yellow-bg">📊</div>
                <h3>Analytics</h3>
                <p>View platform usage and perform metrics</p>
                <button class="action-btn">View Analytics</button>
            </div>
            <div class="manage-card">
                <div class="card-banner blue-bg">📈</div>
                <h3>Activity Tracking</h3>
                <p>Monitor active users and engagement</p>
                <button class="action-btn">Track Activity</button>
            </div>
            <div class="manage-card">
                <div class="card-banner green-bg">📖</div>
                <h3>Content Management</h3>
                <p>Manage learning modules and materials</p>
                <button class="action-btn">Manage Content</button>
            </div>
            <div class="manage-card">
                <div class="card-banner yellow-bg">⚙️</div>
                <h3>System Settings</h3>
                <p>Configure platform preferences and features</p>
                <button class="action-btn">Send Feedback</button>
            </div>
        </div>

        <section class="activity-section">
            <h2>Recent System Activity</h2>
            <p>Latest user registration and system events</p>
            <div class="activity-list">
                <div class="activity-item">
                    <strong>New Student Registration</strong>
                    <span>Kristine Villamor joined 2 hours ago</span>
                </div>
                <div class="activity-item">
                    <strong>Teacher Added Module</strong>
                    <span>New content uploaded to Algebra section</span>
                </div>
                <div class="activity-item">
                    <strong>System Update</strong>
                    <span>Platform updated to v1.1.0</span>
                </div>
            </div>
        </section>
    </main>
</body>
</html>