<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Learning Assistant</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Vite -->
    @vite([
        'resources/css/dashboard/student_dashboard.css',
        'resources/js/dashboard/student_dashboard.js'
    ])
</head>
<body>

<!-- TOP BAR -->
<header class="topbar">
    <div class="brand">
        <i data-feather="book"></i>
        <span>Math Learning Assistant</span>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
</header>

<!-- MAIN -->
<main class="container">

    <!-- WELCOME -->
    <section class="welcome">
        <h1>Welcome back, Student!</h1>
        <p>Continue your mathematics learning journey</p>
    </section>

    <!-- STATS -->
    <section class="stats">
        <div class="card">
            <div class="card-title">Overall Progress</div>
            <div class="card-value">46%</div>
            <div class="progress-bar">
                <span style="width:46%"></span>
            </div>
        </div>

        <div class="card">
            <div class="card-title">Quizzes Completed</div>
            <div class="card-value">12 / 20</div>
        </div>

        <div class="card">
            <div class="card-title">Current Streak</div>
            <div class="card-value">7 days</div>
        </div>
    </section>

    <!-- MODULES -->
    <section class="modules">
        <h2>Learning Modules</h2>
        <p class="subtitle">Track your progress across all topics</p>

        <div class="module">
            <div class="module-header">
                <span>Sequences and Series</span>
                <span class="percent">100%</span>
            </div>
            <div class="progress-bar">
                <span style="width:100%"></span>
            </div>
            <button class="outline-btn">View Topics</button>
        </div>

        <div class="module">
            <div class="module-header">
                <span>Polynomials & Polynomial Equations</span>
                <span class="percent">0%</span>
            </div>
            <div class="progress-bar">
                <span style="width:0%"></span>
            </div>
            <button class="outline-btn">View Topics</button>
        </div>

        <div class="module">
            <div class="module-header">
                <span>Advanced Equations & Functions</span>
                <span class="percent">0%</span>
            </div>
            <div class="progress-bar">
                <span style="width:0%"></span>
            </div>
            <button class="outline-btn">View Topics</button>
        </div>
    </section>

    <!-- ACTIONS -->
    <section class="actions">
        <div class="action-card">
            <h3>AI Chatbot</h3>
            <p>Get instant help with your math questions</p>
            <button class="btn-blue">Start Chat</button>
        </div>

        <div class="action-card">
            <h3>Offline Materials</h3>
            <p>Download assessments to practice offline</p>
            <button class="btn-green">View Downloads</button>
        </div>

        <div class="action-card">
            <h3>Summative Test</h3>
            <p>Test your knowledge with interactive exams</p>
            <button class="btn-blue">Start Test</button>
        </div>
    </section>

</main>

<script>
    feather.replace();
</script>

</body>
</html>
