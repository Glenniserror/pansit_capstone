<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal | Bubog NHS</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/student_login.css', 'resources/js/student_login.js'])
</head>
<body>

    <div class="main-container">
        <a href="#" class="back-home">← Back to Home</a>

        <div class="portal-card" id="portal-card">
            
            <div class="form-side">
                <div class="form-content">
                    <div class="icon-header">
                        <img src="C:\Users\tardi\OneDrive\Documents\hatdog\student.png" alt="Grad Cap">
                    </div>
                    <h1>Student Portal</h1>
                    <p id="sub-text">Sign in to your account?</p>

                    <div class="tab-switcher">
                        <button id="login-tab" class="active" onclick="showLogin()">Login</button>
                        <button id="signup-tab" onclick="showSignUp()">Sign Up</button>
                    </div>

                    <div id="login-form-container" class="form-fade">
                        <form id="login-form">
                            <div class="input-group">
                                <label>Email</label>
                                <input type="email" placeholder="Enter your email" required>
                            </div>
                            <div class="input-group">
                                <label>Password</label>
                                <input type="password" placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn-sign">Sign In</button>
                        </form>
                    </div>

                    <div id="signup-form-container" class="form-fade hidden">
                        <form id="signup-form">
                            <div class="input-group">
                                <label>Username</label>
                                <input type="text" placeholder="Enter your Username">
                            </div>
                            <div class="input-group">
                                <label>Email</label>
                                <input type="email" placeholder="Enter your Email">
                            </div>
                            <div class="input-group">
                                <label>Password</label>
                                <input type="password" placeholder="Enter your Password">
                            </div>
                            <div class="input-group">
                                <label>Confirm password</label>
                                <input type="password" placeholder="Confirm your Password">
                            </div>
                            <button type="submit" class="btn-sign">Create Account</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="image-side" id="image-side">
                <div class="logo-wrapper">
                    <img src="logo-removebg-preview.png" alt="School Logo" class="school-logo">
                </div>
            </div>

        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>