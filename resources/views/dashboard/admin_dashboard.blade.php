<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard - System Administration</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/dashboard/admin_dashboard.css'])
</head>
<body>
    <div class="dashboard-container">
        <header class="header">
            <div class="logo-section">
                <svg class="logo-icon" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                </svg>
                <span class="brand-name">Admin Dashboard</span>
            </div>
            <form method="POST" action="{{ route('admin.logout') }}">
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
                    <div class="metric-body">
                        <div class="metric-info">
                            <p class="metric-label">Total Users</p>
                            <h2 class="metric-value">200</h2>
                            <p class="metric-sub">+12 this week</p>
                        </div>
                        <div class="metric-icon blue">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                        </div>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-body">
                        <div class="metric-info">
                            <p class="metric-label">Active Students</p>
                            <h2 class="metric-value">107</h2>
                            <p class="metric-sub">54% of total users</p>
                        </div>
                        <div class="metric-icon green">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-body">
                        <div class="metric-info">
                            <p class="metric-label">Teachers</p>
                            <h2 class="metric-value">23</h2>
                            <p class="metric-sub">All currently active</p>
                        </div>
                        <div class="metric-icon orange">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                        </div>
                    </div>
                </div>

                <div class="metric-card">
                    <div class="metric-body">
                        <div class="metric-info">
                            <p class="metric-label">System Health</p>
                            <h2 class="metric-value">99.9%</h2>
                            <p class="metric-sub">Server Uptime</p>
                        </div>
                        <div class="metric-icon light-blue">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="dashboard-grid">
                
                <section class="card activity-section">
                    <div class="card-header">
                        <h3>Recent System Activity</h3>
                        <p>Latest user registration and system events</p>
                    </div>
                    <div class="student-list">
                        <div class="student-item">
                            <div class="student-details">
                                <span class="name">New Student Registration</span>
                                <span class="prog">Kristine Villamor joined 2 hours ago</span>
                            </div>
                            <span class="badge excellent">New</span>
                        </div>
                        <div class="student-item">
                            <div class="student-details">
                                <span class="name">Teacher Added Module</span>
                                <span class="prog">New content uploaded to Algebra section</span>
                            </div>
                            <span class="badge good">Update</span>
                        </div>
                        <div class="student-item">
                            <div class="student-details">
                                <span class="name">System Update</span>
                                <span class="prog">Platform updated to v1.1.0</span>
                            </div>
                            <span class="badge excellent">System</span>
                        </div>
                    </div>
                </section>

                <aside class="sidebar-actions">
                    <div class="card action-card">
                        <h3>User Management</h3>
                        <p>Manage account, roles, and permissions</p>
                        <button class="primary-btn">Manage Users</button>
                    </div>

                    <div class="card action-card">
                        <h3>Roles & Permissions</h3>
                        <p>Configure access levels and privileges</p>
                        <button class="outline-btn">Configure Roles</button>
                    </div>

                    <div class="card action-card">
                        <h3>Analytics</h3>
                        <p>View platform usage and performance</p>
                        <button class="outline-btn">View Analytics</button>
                    </div>

                    <div class="card action-card">
                        <h3>Content Management</h3>
                        <p>Manage learning modules and materials</p>
                        <button class="outline-btn">Manage Content</button>
                    </div>
                </aside>
            </div>
        </main>
    </div>
</body>
</html>