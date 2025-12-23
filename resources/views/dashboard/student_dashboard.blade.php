<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/dashboard/student.css')
    @vite('resources/js/dashboard/student.js')
</head>
<body>

<header class="topbar">
    <div class="logo">
        📘 <span>Math Learning Assistant</span>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="logout-btn">Logout</button>
    </form>
</header>

<main class="container">

    <!-- HERO -->
    <section class="hero">
        <h1>Welcome back, {{ auth()->user()->name ?? 'Student' }}!</h1>
        <p>Continue your mathematics learning journey</p>
    </section>

    <!-- STATS -->
    <section class="stats">
        <div class="stat-card">
            <h4>Overall Progress</h4>
            <h2>46%</h2>
            <span>Across all modules</span>
        </div>

        <div class="stat-card">
            <h4>Quizzes Completed</h4>
            <h2>12/20</h2>
            <span>Keep going!</span>
        </div>

        <div class="stat-card">
            <h4>Current Streak</h4>
            <h2>7 days</h2>
            <span>Personal best!</span>
        </div>
    </section>

    <!-- MODULES -->
    <section class="modules">
        <h2>Learning Modules</h2>
        <p>Track your progress across all topics</p>

        <div class="module">
            <div class="module-header">
                <span>Sequences and Series</span>
                <span class="percent green">100%</span>
            </div>
            <div class="progress">
                <div class="bar green" style="width:100%"></div>
            </div>
            <button>View Topics</button>
        </div>

        <div class="module">
            <div class="module-header">
                <span>Polynomials and Polynomial Equations</span>
                <span class="percent blue">0%</span>
            </div>
            <div class="progress">
                <div class="bar blue" style="width:0%"></div>
            </div>
            <button>View Topics</button>
        </div>

        <div class="module">
            <div class="module-header">
                <span>Advanced Equations and Functions</span>
                <span class="percent blue">0%</span>
            </div>
            <div class="progress">
                <div class="bar blue" style="width:0%"></div>
            </div>
            <button>View Topics</button>
        </div>
    </section>

    <!-- ACTIONS -->
    <section class="actions">
        <div class="action-card">
            <h3>AI Chatbot</h3>
            <p>Get instant help with your math questions</p>
            <button class="primary">Start Chat</button>
        </div>

        <div class="action-card">
            <h3>Offline Materials</h3>
            <p>Download assessments to practice offline</p>
            <button>View Downloads</button>
        </div>

        <div class="action-card">
            <h3>Summative Test</h3>
            <p>Test your knowledge with interactive test</p>
            <button class="primary">Start Summative Test</button>
        </div>
    </section>s

</main>

</body>
</html>
