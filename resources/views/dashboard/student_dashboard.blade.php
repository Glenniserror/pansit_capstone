<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Learning Assistant</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <
     @vite([
        'resources/css/dashboard/student_dashboard.css',
        'resources/js/dashboard/student_dashboard.js'
    ]) 
</head>
<body>
    <!-- TOP BAR -->
    <header class="topbar">
        <div class="brand">
            <i data-feather="book-open" aria-hidden="true"></i>
            <span>Math Learning Assistant</span>
        </div>
        <form method="POST" action="{{ route('logout') }}"> <!-- Adapt to Laravel route -->
            @csrf <!-- Add CSRF token for Laravel -->
            <button type="submit" class="logout-btn">
                <i data-feather="log-out" aria-hidden="true"></i>
                Logout
            </button>
        </form>
    </header>

    <!-- MAIN CONTENT (Wrapped in a container for better structure) -->
    <div class="dashboard-container">
        <main class="content">
            <h1 class="welcome-title">Welcome back, Student!</h1>
            <p class="welcome-subtitle">Continue your mathematics learning journey</p>

            <!-- Stats Grid -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-label">Overall Progress</span>
                        <svg class="stat-icon green" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                            <polyline points="17 6 23 6 23 12"></polyline>
                        </svg>
                    </div>
                    <div class="stat-value">46%</div>
                    <div class="stat-desc">Across all modules</div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-label">Quizzes Completed</span>
                        <svg class="stat-icon orange" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"></path>
                            <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"></path>
                            <path d="M4 22h16"></path>
                            <path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"></path>
                            <path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"></path>
                            <path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"></path>
                        </svg>
                    </div>
                    <div class="stat-value">12/20</div>
                    <div class="stat-desc">Keep going!</div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-label">Current Streak</span>
                        <svg class="stat-icon blue" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10"></circle>
                            <circle cx="12" cy="12" r="6"></circle>
                            <circle cx="12" cy="12" r="2"></circle>
                        </svg>
                    </div>
                    <div class="stat-value">7 days</div>
                    <div class="stat-desc">Personal best!</div>
                </div>
            </div>

            <!-- Learning Modules Section -->
            <section class="modules-section">
                <h2 class="section-title">Learning Modules</h2>
                <p class="section-subtitle">Track your progress across all topics</p>

                <div class="module-list">
                    <!-- Module 1 -->
                    <div class="module-item">
                        <div class="module-info">
                            <div class="module-title-row">
                                <svg class="check-icon" viewBox="0 0 24 24" fill="none" stroke="var(--success-color)" stroke-width="2">
                                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                    <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                </svg>
                                <span class="module-name">Sequences and Series</span>
                            </div>
                            <span class="percentage green-text">100 %</span>
                        </div>
                        <div class="progress-bar-bg">
                            <div class="progress-fill" data-width="100" style="width: 0%; background-color: var(--success-color);"></div>
                        </div>
                        <button class="view-topics-btn">View Topics</button>
                    </div>

                    <!-- Module 2 -->
                    <div class="module-item">
                        <div class="module-info">
                            <div class="module-title-row">
                                <svg class="clock-icon" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span class="module-name">Polynomials and Polynomial Equations</span>
                            </div>
                            <span class="percentage blue-text">0 %</span>
                        </div>
                        <div class="progress-bar-bg">
                            <div class="progress-fill" data-width="0" style="width: 0%;"></div>
                        </div>
                        <button class="view-topics-btn">View Topics</button>
                    </div>

                    <!-- Module 3 -->
                    <div class="module-item">
                        <div class="module-info">
                            <div class="module-title-row">
                                <svg class="clock-icon" viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <span class="module-name">Advanced Equations and Functions</span>
                            </div>
                            <span class="percentage blue-text">0 %</span>
                        </div>
                        <div class="progress-bar-bg">
                            <div class="progress-fill" data-width="0" style="width: 0%;"></div>
                        </div>
                        <button class="view-topics-btn">View Topics</button>
                    </div>
                </div>
            </section>

            <!-- Bottom Grid -->
            <div class="bottom-grid">
                <div class="action-card">
                    <div class="icon-box blue-bg">
                        <svg viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="card-title">AI Chatbot</h3>
                    <p class="card-desc">Get instant help with your math questions</p>
                    <button class="primary-btn">Start Chat</button>
                </div>

                <div class="action-card">
                    <div class="icon-box green-bg">
                        <svg viewBox="0 0 24 24" fill="none" stroke="var(--success-color)" stroke-width="2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                            <polyline points="7 10 12 15 17 10"></polyline>
                            <line x1="12" y1="15" x2="12" y2="3"></line>
                        </svg>
                    </div>
                    <h3 class="card-title">Offline Materials</h3>
                    <p class="card-desc">Download assessment to practice offline</p>
                    <button class="secondary-btn">View Downloads</button>
                </div>

                <div class="action-card">
                    <div class="icon-box light-blue-bg">
                        <svg viewBox="0 0 24 24" fill="none" stroke="var(--primary-color)" stroke-width="2">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                    </div>
                    <h3 class="card-title">Summative Test</h3>
                    <p class="card-desc">Test your knowledge with interactive summative test</p>
                    <button class="primary-btn">Start Summative Test</button>
                </div>
            </div>
        </main>
    </div>
    <script src="script.js"></script>
    <script>
        feather.replace(); // Initialize Feather Icons
    </script>
</body>
</html>