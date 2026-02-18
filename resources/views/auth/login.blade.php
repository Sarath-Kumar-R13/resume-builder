<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Resume Builder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
</head>
<body>
    <nav class="custom-navbar">
    <div class="nav-container">

        <div class="nav-logo">
            <img src="{{ asset('images/logo/my_project_logo1.png') }}" alt="Logo">
        </div>

        <ul class="nav-links">
            <li><a href="/">Home</a></li>
            <li><a href="/templates">Templates</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/faqs">FAQs</a></li>
            
        </ul>

    </div>
</nav>

    <div class="logo">
        <img src="{{ asset('images/logo/my_project_logo1.png') }}" alt="Logo">
    </div>

    <div class="login-box">
        <h2>Login</h2>

        @if($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif
       


        <form action="/login" method="POST">
            @csrf

            <label>Email:</label>
            <input type="email" name="email" placeholder="Enter your email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>

            <button type="submit">LOGIN</button>
        </form>

        <div class="extra">
            Don’t have an account?
            <a href="/register">Register</a>
        </div>
    </div>
    <footer class="custom-footer">

    <div class="footer-container">

        <!-- Logo Column -->
        <div class="footer-col">
            <img src="{{ asset('images/logo/my_project_logo1.png') }}" class="footer-logo">
            <p>Create professional resumes in minutes.</p>
        </div>

        <!-- Links -->
        <div class="footer-col">
            <h5>Explore</h5>
            <a href="/about">About</a>
            <a href="/templates">Templates</a>
            <a href="/faqs">FAQs</a>
        </div>

        <!-- Social -->
        <div class="footer-col">
            <h5>Social</h5>
            <a href="#">Instagram</a>
            <a href="#">LinkedIn</a>
            <a href="#">GitHub</a>
        </div>

        <!-- Support -->
        <div class="footer-col">
            <h5>Support</h5>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms</a>
            <a href="#">Contact</a>
        </div>

    </div>

    <div class="footer-bottom">
        © 2026 Resume Builder — All Rights Reserved
    </div>

</footer>

</body>

</html>
