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
            
            <form action="{{ route('teacher.logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-outline" style="width: auto; cursor: pointer;">
                    Logout
                </button>
            </form>
        </header>

        <section style="margin-bottom: 2rem;">
            <h1 style="font-size: 2.5rem; margin-bottom: 0.5rem;">Welcome, {{ Auth::user()->name ?? 'Teacher' }}</h1>
            <p style="color: #666;">Monitor and guide your students' progress</p>
        </section>

        <div class="stats-grid">
            <div class="card">
                <p class="label">Total Students</p>
                <div class="value">{{ $stats['total_students'] ?? 0 }}</div>
                <p class="subtext">Active learners</p>
            </div>
            <div class="card">
                <p class="label">Average Progress</p>
                <div class="value">{{ $stats['avg_progress'] ?? 0 }}% <span style="color: green; font-size: 1rem;">↗</span></div>
                <p class="subtext">+5% from last week</p>
            </div>
            <div class="card">
                <p class="label">Pending Reviews</p>
                <div class="value">{{ $stats['pending_reviews'] ?? 0 }}</div>
                <p class="subtext">Quizzes to grade</p>
            </div>
            <div class="card">
                <p class="label">Messages</p>
                <div class="value">{{ $stats['unread_messages'] ?? 0 }}</div>
                <p class="subtext">Unread Messages</p>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 2rem;">
            <div class="card">
                <h3 style="margin-bottom: 1.5rem;">Recent Student Activity</h3>
                
                @if(isset($recentActivities) && count($recentActivities) > 0)
                    @foreach($recentActivities as $student)
                        <div class="student-item">
                            <div>
                                <strong>{{ $student['name'] }}</strong><br>
                                <small>Progress: {{ $student['progress'] }}%</small>
                            </div>
                            @php
                                // Logic para sa kulay ng badge
                                $statusClass = 'good';
                                if($student['status'] == 'Excellent') $statusClass = 'excellent';
                                if($student['status'] == 'Needs Help') $statusClass = 'help';
                            @endphp
                            <span class="badge {{ $statusClass }}">{{ $student['status'] }}</span>
                        </div>
                    @endforeach
                @else
                    <p style="color: #999; text-align: center;">No recent activity found.</p>
                @endif

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
                <div class="card">
                    <h3>Generate Reports</h3>
                    <p style="font-size: 0.9rem; color: #666; margin: 1rem 0;">Create detailed performance reports</p>
                    <button class="btn-outline">📊 View Reports</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>