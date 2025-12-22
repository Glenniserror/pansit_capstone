<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Dashboard</title>
    @vite([
        'resources/css/dashboard/student_dashboard.css',
        'resources/js/dashboard/student_dashboard.js'
    ])
</head>
<body>

<header class="topbar">
    <div class="brand">Math Learning Assistant</div>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</header>

<main>
    <h1>Welcome back, {{ auth()->user()->name }}!</h1>
    <p>Continue your mathematics learning journey</p>
</main>

</body>
</html>
