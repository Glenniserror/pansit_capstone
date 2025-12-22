<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Learning Assistant</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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
        <i data-feather="book-open"></i>
        <span>Math Learning Assistant</span>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">
            <i data-feather="log-out"></i>
            Logout
        </button>
    </form>
</header>

<!-- MAIN -->
<main class="container">

    <!-- WELCOME -->
    <section class="welcome">
        <h1>Welcome back, Student!</h1>
        <p>Continue your mathematics learning journey with personalized insights and tools.</p>
    </section>

    <!-- STATS -->
    <section class="stats">
        <div class="card">
            <div class="card-icon">
                <i data-feather="trending-up"></i>
            </div>
            <div class="card-content">
                <div class="card-title">Overall Progress</div>
                <div class="card-value">46%</div>
                <div class="progress-bar">
                    <span style="width:46%"></span>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-icon">
                <i data-feather="check-circle"></i>
            </div>
            <div class="card-content">
                <div class="card-title">Quizzes Completed</div>
                <div class="card-value">12 / 20</div>
            </div>
        </div>

        <div class="card">
            <div class="card-icon">
                <i data-feather="flame"></i>
            </div>
            <div class="card-content">
                <div class="card-title">Current Streak</div>
                <div class="card-value">7 days</div>
            </div>
        </div>
    </section>

    <!-- MODULES -->
    <section class="modules">
        <h2>Learning Modules</h2>
        <p class="subtitle">Track your progress across all topics and unlock new challenges.</p>

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
            <div class="action-icon">
                <i data-feather="message-circle"></i>
            </div>
            <h3>AI Chatbot</h3>
            <p>Get instant, personalized help with your math questions from our advanced AI assistant.</p>
            <button class="btn-primary">Start Chat</button>
        </div>

        <div class="action-card">
            <div class="action-icon">
                <i data-feather="download"></i>
            </div>
            <h3>Offline Materials</h3>
            <p>Download comprehensive assessments and resources to practice anytime, anywhere.</p>
            <button class="btn-secondary">View Downloads</button>
        </div>

        <div class="action-card">
            <div class="action-icon">
                <i data-feather="clipboard"></i>
            </div>
            <h3>Summative Test</h3>
            <p>Test your knowledge with interactive, adaptive exams designed to challenge and educate.</p>
            <button class="btn-primary">Start Test</button>
        </div>
    </section>

</main>

<script>
    feather.replace();
</script>

</body>
</html>