<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="{{ asset('css/register.css')}}">
<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

<div class="register-card">
    <!-- @if($errors->any())
    <div style="color:red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif -->
    @if ($errors->any())
    <div class="alert alert-danger rounded-3 shadow-sm">
        {{ $errors->first() }}
    </div>
    @endif



        <h4>REGISTRATION</h4>

    <form method="POST" action="{{route('register')}}">
        @csrf
        <div class="mb-3">
            <label>Full Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Enter your name">
        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" placeholder="Enter your email">
        </div>

        <div class="mb-3">
            <label>Password:</label>
            <input type="password" name="password" class="form-control" placeholder="Password">
        </div>

        <div class="mb-4">
            <label>Confirm Password:</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
        </div>

        <!-- <button class="btn btn-custom w-100 py-2">REGISTER</button> -->
         <button type="submit" class="btn btn-custom w-100 py-2">REGISTER</button>

    </form>

</div>

</body>
</html>
