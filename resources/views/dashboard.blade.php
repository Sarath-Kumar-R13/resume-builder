<!DOCTYPE html>
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
</html>
