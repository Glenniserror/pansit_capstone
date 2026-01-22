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
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
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
                <p class="welcome-subtitle">Manage users, permission, and platform settings</p>
            </div>

            <div class="metrics-grid">
                <div class="metric-card">
                    <div class="metric-header">
                        <span class="metric-label">Total Users</span>
                        <div class="icon-container blue-theme">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="metric-value">200</h2>
                    <p class="metric-sub">+12 this month</p>
                </div>

                <div class="metric-card">
                    <div class="metric-header">
                        <span class="metric-label">Active Students</span>
                        <div class="icon-container green-theme">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                                <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="metric-value">107</h2>
                    <p class="metric-sub">+8% active</p>
                </div>

                <div class="metric-card">
                    <div class="metric-header">
                        <span class="metric-label">Teachers</span>
                        <div class="icon-container orange-theme">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                    </div>
                    <h2 class="metric-value">23</h2>
                    <p class="metric-sub">5 new</p>
                </div>

                <div class="metric-card">
                    <div class="metric-header">
                        <span class="metric-label">System Health</span>
                        <div class="icon-container purple-theme">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline>
                            </svg>
                        </div>
                    </div>
                    <h2 class="metric-value">99.9%</h2>
                    <p class="metric-sub">All systems operational</p>
                </div>
            </div>

            <div class="content-grid">
                <div class="feature-card blue-bg">
                    <div class="feature-icon">👥</div>
                    <h3>User Management</h3>
                    <p>Add, edit, and remove user permissions</p>
                    <button class="action-btn">Manage Users</button>
                </div>

                <div class="feature-card green-bg">
                    <div class="feature-icon">🛡️</div>
                    <h3>Roles & Permissions</h3>
                    <p>Define user roles and privileges</p>
                    <button class="action-btn">Configure Roles</button>
                </div>

                <div class="feature-card orange-bg">
                    <div class="feature-icon">📈</div>
                    <h3>Analytics</h3>
                    <p>View platform usage and perform metrics</p>
                    <button class="action-btn">View Analytics</button>
                </div>

                <div class="feature-card blue-bg">
                    <div class="feature-icon">📊</div>
                    <h3>Activity Tracking</h3>
                    <p>Monitor active users and engagement</p>
                    <button class="action-btn">Track Activity</button>
                </div>

                <div class="feature-card green-bg">
                    <div class="feature-icon">📚</div>
                    <h3>Content Management</h3>
                    <p>Manage learning modules and materials</p>
                    <button class="action-btn">Manage Content</button>
                </div>

                <div class="feature-card orange-bg">
                    <div class="feature-icon">⚙️</div>
                    <h3>System Settings</h3>
                    <p>Configure platform preferences and features</p>
                    <button class="action-btn">Send Feedback</button>
                </div>
            </div>

            <div class="activity-card">
                <h3>Recent System Activity</h3>
                <p>Latest user registration and system events</p>
                
                <div class="activity-item">
                    <h4>New Student Registration</h4>
                    <p>Andrew Turner joined 2 hours ago</p>
                </div>
                <div class="activity-item">
                    <h4>Teacher Added Module</h4>
                    <p>New content uploaded to Algebra section</p>
                </div>
                <div class="activity-item">
                    <h4>System Update</h4>
                    <p>Platform updated to v1.12</p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>