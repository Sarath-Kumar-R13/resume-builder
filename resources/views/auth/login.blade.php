<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Resume Builder</title>
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
</head>
<body>
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
</body>

</html>
