<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal | Bubog NHS</title>

    <link rel="icon" href="{{ asset('image/logo-removebg-preview.png') }}">

    @vite([
        'resources/css/login/admin_login.css',
        'resources/js/login/admin_login.js'
    ])
</head>
<body>

<div class="main-container">
    <a href="{{ url('/') }}" class="back-home">← Back to Home</a>

    <div class="portal-card" id="portal-card">

        <div class="form-side">
            <div class="form-content">

                <div class="icon-header">
                    <img src="{{ asset('image/admin.png') }}" alt="admin Icon">
                </div>

                <h1>Admin Portal</h1>
                <p id="sub-text">Sign in to your account</p>

                @if ($errors->any())
                    <div class="alert alert-danger" style="background-color: #fee2e2; color: #dc2626; padding: 10px; border-radius: 8px; margin-bottom: 1rem; font-size: 0.9rem; border: 1px solid #fecaca;">
                        <ul style="margin: 0; padding-left: 20px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="tab-switcher">
                    <button id="login-tab" type="button" class="active">Login</button>
                    <button id="signup-tab" type="button">Sign Up</button>
                </div>

                <div id="login-form-container">
                    <form method="POST" action="{{ route('admin.login.submit') }}" autocomplete="off">
                        @csrf

                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" autocomplete="off" required>
                        </div>

                        <div class="input-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter your password" autocomplete="new-password" required>
                        </div>

                        <button type="submit" class="btn-sign">Sign In</button>
                    </form>
                </div>

                <div id="signup-form-container" class="hidden">
                    <form method="POST" action="{{ route('admin.register') }}" autocomplete="off">
                        @csrf

                        <div class="input-group">
                            <label>Username</label>
                            <input type="text" name="name" placeholder="Enter your Username" value="{{ old('name') }}" autocomplete="off" required>
                        </div>

                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Enter your Email" value="{{ old('email') }}" autocomplete="off" required>
                        </div>

                        <div class="input-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Enter your Password" autocomplete="new-password" required>
                        </div>

                        <div class="input-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" placeholder="Confirm your Password" autocomplete="new-password" required>
                        </div>

                        <button type="submit" class="btn-sign">Create Account</button>
                    </form>
                </div>

            </div>
        </div>

        <div class="image-side" id="image-side">
            <div class="logo-wrapper">
                <img 
                    src="{{ asset('image/logo-removebg-preview.png') }}" 
                    alt="School Logo" 
                    class="school-logo"
                >
            </div>
        </div>

    </div>
</div>

</body>
</html>