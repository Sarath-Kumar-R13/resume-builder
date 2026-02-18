<!DOCTYPE html>
<html>
<head>
    <title>Dashboard | ProVitae</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body class="bg-light">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-transparent px-4 nav-glb">
   <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
    <img src="{{ asset('images/logo/my_project_logo1_2_0.png') }}" alt="ProVitae Logo" class="me-2">
</a>

    
    <div class="ms-auto d-flex align-items-center">
        <span class="text-dark me-3">
            Welcome, {{ $user->name }}
        </span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-sm btn-outline-dark">Logout</button>
        </form>
    </div>
</nav>

<!-- MAIN CONTAINER -->
<div class="container mt-5">

    <!-- HEADER SECTION -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Your Resumes</h2>

        <a href="{{ route('resume.create') }}" class="btn btn-primary shadow">
            + Create Resume
        </a>
    </div>

    <!-- RESUME LIST -->
    @if($resumes->count() > 0)

        <div class="row">
            @foreach($resumes as $resume)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 resume-card">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">
                                {{ $resume->title ?? 'Untitled Resume' }}
                            </h5>

                            <p class="text-muted small">
                                Created: {{ $resume->created_at->format('d M Y') }}
                            </p>

                            <div class="d-flex justify-content-between mt-3">
                                <a href="#" class="btn btn-sm btn-outline-primary">View</a>
                                <a href="#" class="btn btn-sm btn-outline-secondary">Edit</a>
                                <a href="#" class="btn btn-sm btn-outline-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @else

        <div class="text-center mt-5">
            <h5 class="text-muted">NO RESUMES FOUND.</h5>
            <p>Create your first professional resume now.</p>
            <a href="{{ route('resume.create') }}" class="btn btn-success mt-2">
                Create Resume
            </a>
        </div>

    @endif

</div>

</body>
</html>

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

    <h2>Welcome, {{ $user->name }}</h2>

    <a href="/resume/create">Create Resume</a>

    <hr>

    <h3>Your Resumes</h3>

    @if($resumes->count() > 0)
        <ul>
            @foreach($resumes as $resume)
                <li>
                    {{ $resume->title ?? 'Untitled Resume' }}
                    |
                    <a href="/resume/{{ $resume->id }}/edit">Edit</a>
                    |
                    <a href="/resume/{{ $resume->id }}/preview">Preview</a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No resumes found.</p>
    @endif

</body>
</html> -->
