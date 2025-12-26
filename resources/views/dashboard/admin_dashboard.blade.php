<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/dashboard/admin_dashboard.css'])
</head>
<body>
    <div class="dashboard-container">
        <header class="navbar">
            <div class="logo-area">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                </svg>
                <span class="brand-text">Admin Dashboard</span>
            </div>
            <button class="logout-btn">Logout</button>
        </header>

        <main class="content-wrapper">
            <section class="hero">
                <h1>System Administration</h1>
                <p>Manage users, permission, and platform settings</p>
            </section>

            <div class="stats-row">
                <div class="stat-card">
                    <div class="stat-top"><span>Total Users</span> <span class="stat-icon blue">👥</span></div>
                    <div class="stat-val">200</div>
                    <div class="stat-label">+12 this week</div>
                </div>
                <div class="stat-card">
                    <div class="stat-top"><span>Active Students</span> <span class="stat-icon green">📖</span></div>
                    <div class="stat-val">107</div>
                    <div class="stat-label">54% of total</div>
                </div>
                <div class="stat-card">
                    <div class="stat-top"><span>Teachers</span> <span class="stat-icon orange">👥</span></div>
                    <div class="stat-val">23</div>
                    <div class="stat-label">All active</div>
                </div>
                <div class="stat-card">
                    <div class="stat-top"><span>System Health</span> <span class="stat-icon light-blue">📈</span></div>
                    <div class="stat-val">99.9%</div>
                    <div class="stat-label">Uptime</div>
                </div>
            </div>

            <div class="modules-grid">
                <div class="module-card">
                    <div class="banner-strip blue-strip">👥</div>
                    <h3>User Management</h3>
                    <p>Manage account, roles, and permissions</p>
                    <button class="action-btn">Manage Users</button>
                </div>
                <div class="module-card">
                    <div class="banner-strip green-strip">🛡️</div>
                    <h3>Roles & Permissions</h3>
                    <p>Configure acess levels and privileges</p>
                    <button class="action-btn">Configure Roles</button>
                </div>
                <div class="module-card">
                    <div class="banner-strip yellow-strip">📊</div>
                    <h3>Analytics</h3>
                    <p>View platform usage and perform metrics</p>
                    <button class="action-btn">View Analytics</button>
                </div>
                <div class="module-card">
                    <div class="banner-strip blue-strip">📈</div>
                    <h3>Activity Tracking</h3>
                    <p>Monitor active users and engagement</p>
                    <button class="action-btn">Track Activity</button>
                </div>
                <div class="module-card">
                    <div class="banner-strip green-strip">📖</div>
                    <h3>Content Management</h3>
                    <p>Manage learning modules and materials</p>
                    <button class="action-btn">Manage Content</button>
                </div>
                <div class="module-card">
                    <div class="banner-strip yellow-strip">⚙️</div>
                    <h3>System Settings</h3>
                    <p>Configure platform preferences and features</p>
                    <button class="action-btn">Send Feedback</button>
                </div>
            </div>

            <section class="activity-box">
                <div class="box-header">
                    <h2>Recent System Activity</h2>
                    <p>Latest user registration and system events</p>
                </div>
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
            </section>
        </main>
    </div>
</body>
</html>