<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Learning Assistant</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- VITE -->
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

    <button class="logout-btn">Logout</button>
</header>

<!-- MAIN CONTENT -->
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
        <div class="action-card blue">
            <h3>AI Chatbot</h3>
            <p>Get instant help with your math questions</p>
            <button>Start Chat</button>
        </div>

        <div class="action-card green">
            <h3>Offline Materials</h3>
            <p>Download assessments to practice offline</p>
            <button>View Downloads</button>
        </div>

        <div class="action-card purple">
            <h3>Summative Test</h3>
            <p>Test your knowledge with interactive exams</p>
            <button>Start Test</button>
        </div>
    </section>

</main>

<!-- JS -->
<script src="{{ asset('js/dashboard.js') }}"></script>
<script>
    feather.replace();
</script>

</body>
</html>
