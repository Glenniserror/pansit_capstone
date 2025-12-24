<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard | Bubog NHS</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/dashboard/teacher_dashboard.css', 'resources/js/dashboard/teacher_dashboard.js'])
</head>
<body>

<nav class="navbar">
    <div class="nav-left">
        <img src="{{ asset('image/logo-removebg-preview.png') }}" alt="Logo" class="nav-logo">
        <span class="brand-name">Teacher Dashboard</span>
    </div>
    <form action="{{ route('teacher.logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</nav>

<main class="dashboard-container">
    <header class="welcome-header">
        <h1>Welcome, {{ Auth::user()->name }}</h1>
        
        @if(session('success'))
            <div style="background: #e8f5e9; color: #2e7d32; padding: 10px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #c8e6c9;">
                {{ session('success') }}
            </div>
        @endif

        <p>You have no active student activity yet. Start by reviewing modules or enrolling students.</p>
    </header>

    <section class="stats-grid">
        <div class="stat-card">
            <div class="stat-info">
                <span class="label">Total Students</span>
                <h2 class="value">0</h2>
                <span class="sub-text">No students enrolled</span>
            </div>
            <div class="stat-icon" style="color: #1E88E5;">👥</div>
        </div>
        <div class="stat-card">
            <div class="stat-info">
                <span class="label">Average Progress</span>
                <h2 class="value">0%</h2>
                <span class="sub-text">Starting fresh</span>
            </div>
            <div class="stat-icon" style="color: #2ecc71;">📈</div>
        </div>
        <div class="stat-card">
            <div class="stat-info">
                <span class="label">Pending Reviews</span>
                <h2 class="value">0</h2>
                <span class="sub-text">All caught up</span>
            </div>
            <div class="stat-icon" style="color: #f39c12;">📄</div>
        </div>
        <div class="stat-card">
            <div class="stat-info">
                <span class="label">Messages</span>
                <h2 class="value">0</h2>
                <span class="sub-text">No new messages</span>
            </div>
            <div class="stat-icon" style="color: #00bcd4;">💬</div>
        </div>
    </section>

    <div class="content-layout">
        <section class="activity-section card-container">
            <div class="section-header">
                <h3>Recent Student Activity</h3>
                <p style="font-size: 0.85rem; color: #888;">Monitor your students' latest progress</p>
            </div>
            
            <div class="empty-state">
                <div style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.3;">📊</div>
                <p>No recent activity found. Students' progress will appear here once they start their modules.</p>
            </div>

            <button class="view-all-btn" style="margin-top: 1.5rem;" disabled>View All Students</button>
        </section>

        <aside class="actions-column">
            <div class="side-card">
                <h3>Provide Feedback</h3>
                <p>Send personalized recommendations to students</p>
                <button class="btn-primary main-action-btn" disabled>Send Feedback</button>
            </div>

            <div class="side-card" style="margin-top: 1.5rem;">
                <h3>Print Materials</h3>
                <p>Download modules for offline distribution</p>
                <button class="btn-outline main-action-btn">🖨️ Generate PDFs</button>
            </div>

            <div class="side-card" style="margin-top: 1.5rem;">
                <h3>Generate Reports</h3>
                <p>Create detailed performance reports for your class</p>
                <button class="btn-outline main-action-btn">📊 View Reports</button>
            </div>
        </aside>
    </div>
</main>

<div id="ai-bubble" class="fab">💬</div>

</body>
</html>