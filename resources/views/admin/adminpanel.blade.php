<!DOCTYPE html>
<html>
<head>
    <title>Admin panel | ProVitae</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    
</head>

<body class="text-dark">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark glass px-4">
    <a class="navbar-brand d-flex align-items-center" href="#">
        <!-- <img src="{{ asset('images/logo/RB-logo2-1.png') }}" height="40" class="me-2"> -->
        <strong>Admin Panel</strong>
    </a>

    <div class="ms-auto">
        <span class="me-3">Welcome Admin</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-sm btn-outline-light">Logout</button>
        </form>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
        <div class="col-md-2 sidebar p-4">
            <h5 class="mb-4">Controls</h5>

            <ul class="nav flex-column">
                <li class="nav-item mb-3">
                    <a href="#" class="nav-link text-white">📊 Dashboard</a>
                </li>

                <li class="nav-item mb-3">
                    <a href="#" class="nav-link text-white">👥 Manage Users</a>
                </li>

                <li class="nav-item mb-3">
                    <a href="#" class="nav-link text-white">📄 Manage Resumes</a>
                </li>

                <li class="nav-item mb-3">
                    <a href="#" class="nav-link text-white">🎨 Templates</a>
                </li>
            </ul>
        </div>

        <!-- MAIN CONTENT -->
        <div class="col-md-10 p-5">

            <h2 class="mb-4">Admin Overview</h2>

            <!-- STATS CARDS -->
            <div class="row mb-5">
                <div class="col-md-4">
                    <div class="card card-glass shadow p-4">
                        <h5>Total Users</h5>
                        <h2>{{ $totalUsers ?? 0 }}</h2>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-glass shadow p-4">
                        <h5>Total Resumes</h5>
                        <h2>{{ $totalResumes ?? 0 }}</h2>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-glass shadow p-4">
                        <h5>Templates</h5>
                        <h2>3</h2>
                    </div>
                </div>
            </div>

            <!-- USERS TABLE -->
            <div class="card card-glass p-4 shadow">
                <h5 class="mb-3">Latest Users</h5>

                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Joined</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users ?? [] as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">No users found</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

</body>
</html>
