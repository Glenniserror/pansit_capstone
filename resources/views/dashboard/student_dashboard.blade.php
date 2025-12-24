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
            <div class="hero-section">
                <h1 class="welcome-title">Welcome back, {{ auth()->user()->name ?? 'Student' }}!</h1>
                <p class="welcome-subtitle">Continue your mathematics learning journey</p>
            </div>

            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-label">Overall Progress</span>
                        <svg class="stat-icon green" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg>
                    </div>
                    <div class="stat-value">0%</div>
                    <div class="stat-desc">Across all modules</div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-label">Quizzes Completed</span>
                        <svg class="stat-icon orange" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"></path><path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"></path><path d="M4 22h16"></path><path d="M10 14.66V17c0 .55-.47.98-.97 1.21C7.85 18.75 7 20.24 7 22"></path><path d="M14 14.66V17c0 .55.47.98.97 1.21C16.15 18.75 17 20.24 17 22"></path><path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"></path></svg>
                    </div>
                    <div class="stat-value">0/20</div>
                    <div class="stat-desc">Keep going!</div>
                </div>
                <div class="stat-card">
                    <div class="stat-header">
                        <span class="stat-label">Current Streak</span>
                        <svg class="stat-icon blue" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                    </div>
                    <div class="stat-value">0 days</div>
                    <div class="stat-desc">Personal best!</div>
                </div>
            </div>

            <section class="modules-section">
                <h2 class="section-title">Learning Modules</h2>
                <p class="section-subtitle">Track your progress across all topics</p>

                <div class="module-list">
                    @php
                        $displayModules = isset($modules) && count($modules) > 0 ? $modules : [
                            ['name' => 'Sequences and Series', 'progress' => 0, 'completed' => false],
                            ['name' => 'Polynomials and Polynomial Equations', 'progress' => 0, 'completed' => false],
                            ['name' => 'Advanced Equations and Functions', 'progress' => 0, 'completed' => false]
                        ];
                        
                        // Ito ang logic: Ang unang module ay laging unlock (canAccessNext = true sa simula)
                        $canAccessNext = true; 
                    @endphp

                    @foreach($displayModules as $module)
                        @php
                            $isLocked = !$canAccessNext;
                        @endphp

                        <div class="module-item {{ $isLocked ? 'module-locked' : '' }}">
                            <div class="module-info">
                                <div class="module-title-row">
                                    @if($isLocked)
                                        <svg class="lock-icon" viewBox="0 0 24 24" fill="none" stroke="#999" stroke-width="2" style="width:18px; height:18px; margin-right:8px;">
                                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                        </svg>
                                    @elseif($module['completed'] ?? false)
                                        <svg class="check-icon" viewBox="0 0 24 24" fill="none" stroke="#28a745" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                                    @else
                                        <svg class="clock-icon" viewBox="0 0 24 24" fill="none" stroke="#007bff" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                    @endif
                                    <span class="module-name">{{ $module['name'] }}</span>
                                </div>
                                <span class="percentage {{ $isLocked ? 'gray-text' : 'blue-text' }}">
                                    {{ $isLocked ? 'Locked' : $module['progress'] . '%' }}
                                </span>
                            </div>
                            <div class="progress-bar-bg">
                                <div class="progress-fill" style="width: {{ $module['progress'] }}%; background: {{ $isLocked ? '#e0e0e0' : '#007bff' }};"></div>
                            </div>
                            
                            <button class="view-topics-btn" {{ $isLocked ? 'disabled' : '' }}>
                                {{ $isLocked ? 'Locked' : 'View Topics' }}
                            </button>
                        </div>

                        @php
                            // Pagkatapos ng bawat loop, iche-check kung tapos na ba itong module na to.
                            // Kung tapos na (100%), ang SUSUNOD na module sa loop ay magiging unlock.
                            $canAccessNext = (($module['progress'] ?? 0) == 100);
                        @endphp
                    @endforeach
                </div>
            </section>

            <div class="bottom-grid">
                <div class="action-card">
                <div class="icon-box blue-bg">
                    <svg viewBox="0 0 24 24" fill="none" stroke="#007bff" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                </div>
                    <h3 class="card-title">AI Chatbot</h3>
                    <p class="card-desc">Get instant help with your math questions</p>
                    <button class="primary-btn" id="start-chat-btn">Start Chat</button>
                </div>

                <div class="action-card">
                    <div class="icon-box green-bg">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#28a745" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="7 10 12 15 17 10"></polyline><line x1="12" y1="15" x2="12" y2="3"></line></svg>
                    </div>
                    <h3 class="card-title">Offline Materials</h3>
                    <p class="card-desc">Download assessment to practice offline</p>
                    <button class="secondary-btn">View Downloads</button>
                </div>

                <div class="action-card">
                    <div class="icon-box blue-bg">
                        <svg viewBox="0 0 24 24" fill="none" stroke="#007bff" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                    </div>
                    <h3 class="card-title">Summative Test</h3>
                    <p class="card-desc">Test your knowledge with interactive summative test</p>
                    <button class="primary-btn">Start Summative Test</button>
                </div>
            </div>
        </main>
    </div>
    <div id="ai-bubble" class="messenger-bubble">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
</div>

<div id="ai-chat-window" class="chat-window-compact">
    <div class="chat-header">
        <div class="user-info">
            <div class="status-dot"></div>
            <span>Math AI Assistant</span>
        </div>
        <button id="close-chat">&times;</button>
    </div>
    
    <div id="chat-content" class="chat-content">
        <div class="msg bot">Hello! Ask me any math questions.</div>
    </div>

    <div class="chat-footer">
        <input type="text" id="ai-input" placeholder="Type a message...">
        <button id="ai-send-btn">
            <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
        </button>
    </div>
</div>
</body>
</html>