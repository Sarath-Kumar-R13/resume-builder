<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resume Builder</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    
</head>
<body>

<!-- //NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light shadow-sm my-nav">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">RESUME BUILDER</a>

        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Templates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-primary me-2" href="{{ route('login')}}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{route('register')}}">Register</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO SECTION -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1>Create a Professional Resume in Minutes</h1>
                <p class="text-muted mt-3">
                    Build modern, job-ready resumes with ease.  
                    Choose a template, fill in your details, and download your resume as PDF.
                </p>

                <div class="mt-4">
                    <a href="#" class="btn btn-primary btn-lg me-2">Get Started</a>
                    <a href="#" class="btn btn-outline-secondary btn-lg">View Templates</a>
                </div>
            </div>

            <div class="col-md-6 text-center">
                <img src="https://cdn-icons-png.flaticon.com/512/3135/3135768.png"
                     alt="Resume"
                     class="img-fluid"
                     style="max-width: 300px;">
            </div>
        </div>
    </div>
</section>

<!-- FEATURES -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4">
                <h5 class="fw-bold">Easy to Use</h5>
                <p class="text-muted">Simple form-based resume creation.</p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold">Modern Templates</h5>
                <p class="text-muted">Choose from professional designs.</p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold">PDF Download</h5>
                <p class="text-muted">Export resumes instantly as PDF.</p>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="text-center py-3 bg-light">
    <small class="text-muted">
        © {{ date('1997') }} ResumeBuilder.Proprietor Sarath Kumar R. All rights reserved.
    </small>
</footer>

</body>
</html>
