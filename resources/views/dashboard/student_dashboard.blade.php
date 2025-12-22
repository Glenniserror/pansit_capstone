<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Learning Assistant - Dashboard</title>
    @vite('resources/css/dashboard/student_dashboard.css')
    @vite('resources/js/dashboard/student_dashboard.js')
</head>
<body>
    <div class="dashboard-container">
        <header class="header">
            <div class="logo-section">
                <svg class="logo-icon" viewBox="0 0 24 24" fill="none" stroke="#4A90E2" stroke-width="2">
                    <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                    <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                </svg>
                <span class="brand-name">Math Learning Assistant</span>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </header>

        <main class="content">
            <h1 class="welcome-title">Welcome back, {{ auth()->user()->name ?? 'Student' }}!</h1>
            <p class="welcome-subtitle">Continue your mathematics learning journey</p>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-label">Overall Progress</span>
                        <svg class="stat-icon green" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                    </div>
                    <div class="stat-value">{{ $overallProgress ?? 0 }}%</div>
                    <div class="stat-desc">Across all modules</div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-label">Quizzes Completed</span>
                        <svg class="stat-icon orange" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"></path><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"></path><path d="M4 22h16"></path><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"></path><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"></path><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"></path></svg>
                    </div>
                    <div class="stat-value">{{ $quizzesCompleted ?? 0 }}</div>
                    <div class="stat-desc">Keep going!</div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-label">Current Streak</span>
                        <svg class="stat-icon blue" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                    </div>
                    <div class="stat-value">{{ $currentStreak ?? 0 }}</div>
                    <div class="stat-desc">Personal best!</div>
                </div>
            </div>

            <section class="modules-section">
                <h2 class="section-title">Learning Modules</h2>
                <p class="section-subtitle">Track your progress across all topics</p>

                <div class="module-list">
                    {{-- Gagamit tayo ng PHP array para siguradong may 3 modules na makikita --}}
                    @php
                        $displayModules = isset($modules) && count($modules) > 0 ? $modules : [
                            ['name' => 'Introduction to Algebra', 'progress' => 0, 'completed' => false],
                            ['name' => 'Linear Equations', 'progress' => 0, 'completed' => false],
                            ['name' => 'Geometry Basics', 'progress' => 0, 'completed' => false]
                        ];
                    @endphp

                    @foreach($displayModules as $module)
                        <div class="module-item">
                            <div class="module-info">
                                <div class="module-title-row">
                                    @if($module['completed'] ?? false)
                                        <svg class="check-icon" viewBox="0 0 24 24" fill="none" stroke="#2ecc71" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                    @else
                                        <svg class="clock-icon" viewBox="0 0 24 24" fill="none" stroke="#3498db" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    @endif
                                    <span class="module-name">{{ $module['name'] ?? 'Module' }}</span>
                                </div>
                                <span class="percentage {{ ($module['completed'] ?? false) ? 'green-text' : 'blue-text' }}">
                                    {{ $module['progress'] ?? 0 }}%
                                </span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-fill" style="width: {{ $module['progress'] ?? 0 }}%; background-color: {{ ($module['completed'] ?? false) ? '#2ecc71' : '#3498db' }};"></div>
                            </div>
                            <button class="view-topics-btn">View Topics</button>
                        </div>
                    @endforeach
                </div>
            </section>

            <div class="bottom-grid">
                <div class="action-card">
                    <div class="icon-box blue-bg">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#0066cc" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                    </div>
                    <h3 class="card-title">AI Chatbot</h3>
                    <p class="card-desc">Get instant help with your math questions</p>
                    <button class="primary-btn">Start Chat</button>
                </div>

                <div class="action-card">
                    <div class="icon-box green-bg">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#27ae60" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                    </div>
                    <h3 class="card-title">Offline Materials</h3>
                    <p class="card-desc">Download assessment to practice offline</p>
                    <button class="secondary-btn">View Downloads</button>
                </div>

                <div class="action-card">
                    <div class="icon-box light-blue-bg">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#0066cc" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                    </div>
                    <h3 class="card-title">Summative Test</h3>
                    <p class="card-desc">Test your knowledge with interactive summative test</p>
                    <button class="primary-btn">Start Summative Test</button>
                </div>
            </div>
        </main>
    </div>
</body>
</html>