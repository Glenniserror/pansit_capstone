<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Teacher Dashboard</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite([
        'resources/css/dashboard/teacher_dashboard.css',
        'resources/js/dashboard/teacher_dashboard.js'
    ])
</head>
<body>

<header class="topbar">
    <div class="brand">
        <svg viewBox="0 0 24 24">
            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
        </svg>
        <span>Teacher Dashboard</span>
    </div>

    <form method="POST" action="{{ route('teacher.logout') }}">
        @csrf
        <button class="logout-btn">Logout</button>
    </form>
</header>

<main class="container">

    <section class="page-header">
        <h1>Welcome, Teacher</h1>
        <p>Monitor and guide your students' progress</p>
    </section>

    <!-- STATS -->
    <section class="stats">
        <div class="stat-card">
            <p>Total Students</p>
            <h2 data-target="124">0</h2>
            <span>Active learners</span>
        </div>

        <div class="stat-card">
            <p>Average Progress</p>
            <h2 data-target="67">0%</h2>
            <span>+5% from last week</span>
        </div>

        <div class="stat-card">
            <p>Pending Reviews</p>
            <h2 data-target="18">0</h2>
            <span>Quizzes to grade</span>
        </div>

        <div class="stat-card">
            <p>Messages</p>
            <h2 data-target="7">0</h2>
            <span>Unread Messages</span>
        </div>
    </section>

    <!-- CONTENT -->
    <section class="content-grid">

        <!-- STUDENTS -->
        <div class="card students">
            <h3>Recent Student Activity</h3>
            <p class="muted">Monitor your students' progress</p>

            <div class="student">
                <div>
                    <strong>Meland Carman</strong>
                    <small>Progress: 78%</small>
                </div>
                <span class="badge excellent">Excellent</span>
            </div>

            <div class="student">
                <div>
                    <strong>Stephanie Tamayuza</strong>
                    <small>Progress: 65%</small>
                </div>
                <span class="badge good">Good</span>
            </div>

            <div class="student">
                <div>
                    <strong>Kristine Villamor</strong>
                    <small>Progress: 45%</small>
                </div>
                <span class="badge danger">Needs Help</span>
            </div>

            <div class="student">
                <div>
                    <strong>Rhyssa Embanacido</strong>
                    <small>Progress: 82%</small>
                </div>
                <span class="badge excellent">Excellent</span>
            </div>

            <button class="outline-btn">View All Students</button>
        </div>

        <!-- ACTIONS -->
        <div class="card">
            <h3>Provide Feedback</h3>
            <p class="muted">Send personalized recommendations to students</p>
            <button class="primary-btn">Send Feedback</button>
        </div>

        <div class="card">
            <h3>Print Materials</h3>
            <p class="muted">Download modules for offline distribution</p>
            <button class="outline-btn">Generate PDFs</button>
        </div>

        <div class="card">
            <h3>Generate Reports</h3>
            <p class="muted">Create detailed performance reports</p>
            <button class="outline-btn">View Reports</button>
        </div>

    </section>

</main>

</body>
</html>
