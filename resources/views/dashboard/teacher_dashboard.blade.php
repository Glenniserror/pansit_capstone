<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    @vite(['resources/css/dashboard/teacher_dashboard.css', 'resources/js/dashboard/teacher_dashboard.js'])
</head>
<body>
    <div class="dashboard-container">
        <header class="header">
            <div style="display:flex; align-items:center; gap:10px;">
                <span style="font-size: 24px;">📘</span>
                <h2 style="font-weight: 800;">Teacher Dashboard</h2>
            </div>
            <button class="btn-outline" style="width: auto;">Logout</button>
        </header>

        <section style="margin-bottom: 2rem;">
            <h1 style="font-size: 2.5rem; margin-bottom: 0.5rem;">Welcome, Teacher</h1>
            <p style="color: #666;">Monitor and guide your students' progress</p>
        </section>

        <div class="stats-grid">
            <div class="card">
                <p class="label">Total Students</p>
                <div class="value">124</div>
                <p class="subtext">Active learners</p>
            </div>
            <div class="card">
                <p class="label">Average Progress</p>
                <div class="value">67% <span style="color: green; font-size: 1rem;">↗</span></div>
                <p class="subtext">+5% from last week</p>
            </div>
            <div class="card">
                <p class="label">Pending Reviews</p>
                <div class="value">18</div>
                <p class="subtext">Quizzes to grade</p>
            </div>
            <div class="card">
                <p class="label">Messages</p>
                <div class="value">7</div>
                <p class="subtext">Unread Messages</p>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
            <div class="card">
                <h3 style="margin-bottom: 1.5rem;">Recent Student Activity</h3>
                <div class="student-item">
                    <div><strong>Meland Carman</strong><br><small>Progress: 78%</small></div>
                    <span class="badge excellent">Excellent</span>
                </div>
                <div class="student-item">
                    <div><strong>Stephanie Tamayuza</strong><br><small>Progress: 65%</small></div>
                    <span class="badge good">Good</span>
                </div>
                <div class="student-item">
                    <div><strong>Kristine Villamor</strong><br><small>Progress: 45%</small></div>
                    <span class="badge help">Needs Help</span>
                </div>
                <button class="btn-outline" style="margin-top: 1rem;">View All Students</button>
            </div>

            <div style="display: flex; flex-direction: column; gap: 1.5rem;">
                <div class="card">
                    <h3>Provide Feedback</h3>
                    <p style="font-size: 0.9rem; color: #666; margin: 1rem 0;">Send personalized recommendations to students</p>
                    <button class="btn-blue">Send Feedback</button>
                </div>
                <div class="card">
                    <h3>Print Materials</h3>
                    <p style="font-size: 0.9rem; color: #666; margin: 1rem 0;">Download modules for offline distribution</p>
                    <button class="btn-outline">📥 Generate PDFs</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>