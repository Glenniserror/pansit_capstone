<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Portal | Bubog NHS</title>
    @vite(['resources/css/student_login.css', 'resources/js/student_login.js'])
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

<div class="main-container">
    <a href="{{ url('/') }}" class="back-home">← Back to Home</a>

    <div class="portal-card" id="portal-card">

        <!-- FORM SIDE -->
        <div class="form-side">
            <div class="form-content">
                <div class="icon-header">
                    <img src="{{ asset('image/student.png') }}" alt="Grad Cap">
                </div>
                <h1>Teacher Portal</h1>
                <p id="sub-text">Sign in to your account</p>

                <!-- TAB SWITCHER -->
                <div class="tab-switcher">
                    <button id="login-tab" type="button" class="active">Login</button>
                    <button id="signup-tab" type="button">Sign Up</button>
                </div>

                <!-- LOGIN FORM -->
                <div id="login-form-container">
                    <form method="POST" action="{{ route('teacher.login.submit') }}">
                        @csrf
                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="input-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn-sign">Sign In</button>
                    </form>
                </div>

                <!-- SIGNUP FORM -->
                <div id="signup-form-container" class="hidden">
                    <form method="POST" action="{{ route('teacher.register') }}">
                        @csrf
                        <div class="input-group">
                            <label>Username</label>
                            <input type="text" name="name" placeholder="Enter your Username" required>
                        </div>
                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Enter your Email" required>
                        </div>
                        <div class="input-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter your Password" required>
                        </div>
                        <div class="input-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" placeholder="Confirm your Password" required>
                        </div>
                        <button type="submit" class="btn-sign">Create Account</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- IMAGE SIDE -->
        <div class="image-side" id="image-side">
            <div class="logo-wrapper">
                <img src="{{ asset('image/logo-removebg-preview.png') }}" 
                     alt="School Logo" 
                     class="school-logo">
            </div>
        </div>

    </div>
</div>

</body>
</html>
