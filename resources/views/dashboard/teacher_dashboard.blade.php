<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Math Learning Assistant - Teacher Dashboard</title>

    @vite([
        'resources/css/dashboard/teacher_dashboard.css',
        'resources/js/dashboard/teacher_dashboard.js'
    ])
</head>
<body>

<div class="dashboard-container">

    {{-- HEADER --}}
    <header class="header">
        <div class="logo-section">
            <svg class="logo-icon" viewBox="0 0 24 24" fill="none" stroke="#007bff" stroke-width="2">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
            </svg>
            <span class="brand-name">Math Learning Assistant</span>
        </div>

        <form method="POST" action="{{ route('teacher.logout') }}">
            @csrf
            <button class="logout-btn">Logout</button>
        </form>
    </header>

    {{-- HERO --}}
    <section class="hero-section">
        <h1 class="welcome-title">
            Welcome, {{ Auth::check() ? Auth::user()->name : 'Teacher' }}
        </h1>
        <p class="welcome-subtitle">
            Monitor and guide your students' progress
        </p>
    </section>

    {{-- STATS --}}
    <section class="stats-grid">
        <div class="stat-card">
            <div class="stat-header">
                <span class="stat-label">Total Students</span>
            </div>
            <div class="stat-value" data-target="124">0</div>
            <div class="stat-desc">Active learners</div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <span class="stat-label">Average Progress</span>
            </div>
            <div class="stat-value" data-target="67">0%</div>
            <div class="stat-desc">+5% from last week</div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <span class="stat-label">Pending Reviews</span>
            </div>
            <div class="stat-value" data-target="18">0</div>
            <div class="stat-desc">Quizzes to grade</div>
        </div>

        <div class="stat-card">
            <div class="stat-header">
                <span class="stat-label">Messages</span>
            </div>
            <div class="stat-value" data-target="7">0</div>
            <div class="stat-desc">Unread messages</div>
        </div>
    </section>

    {{-- MAIN GRID --}}
    <section class="bottom-grid">

        {{-- STUDENT ACTIVITY --}}
        <div class="action-card large-card">
            <h3 class="card-title">Recent Student Activity</h3>

            <div class="student-row excellent">
                <span>Meland Carman</span>
                <span>78%</span>
            </div>

            <div class="student-row good">
                <span>Stephanie Tamayuza</span>
                <span>65%</span>
            </div>

            <div class="student-row danger">
                <span>Kristine Villamor</span>
                <span>45%</span>
            </div>

            <button class="secondary-btn">View All Students</button>
        </div>

        {{-- ACTIONS --}}
        <div class="action-card">
            <h3 class="card-title">Provide Feedback</h3>
            <p class="card-desc">Send personalized recommendations</p>
            <button class="primary-btn">Send Feedback</button>
        </div>

        <div class="action-card">
            <h3 class="card-title">Print Materials</h3>
            <p class="card-desc">Download modules for offline use</p>
            <button class="secondary-btn">Generate PDFs</button>
        </div>

        <div class="action-card">
            <h3 class="card-title">Generate Reports</h3>
            <p class="card-desc">Create detailed performance reports</p>
            <button class="secondary-btn">View Reports</button>
        </div>

    </section>

</div>

</body>
</html>
