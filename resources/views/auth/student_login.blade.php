<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal</title>
    @vite([
        'resources/css/login/student_login.css',
        'resources/js/login/student_login.js'
    ])
</head>
<body>

@if(auth()->check())
<script>
    window.location.href = "{{ route('student.dashboard') }}";
</script>
@endif

<div class="main-container">
    <div class="portal-card">
        <div class="form-side">
            <h1>Student Login</h1>
            <form method="POST" action="{{ route('student.login.submit') }}">
                @csrf
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
