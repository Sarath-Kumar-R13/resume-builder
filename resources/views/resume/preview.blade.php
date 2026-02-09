<h1>{{$resume->resume_data[</h1><!DOCTYPE html>
<html>
<head>
    <title>Resume Preview</title>
</head>
<body>

<h1>{{ $resume->resume_data['personal']['name'] }}</h1>
<p>{{ $resume->resume_data['personal']['job_title'] }}</p>
<p>{{ $resume->resume_data['personal']['email'] }}</p>

<hr>

<h3>Organisation</h3>
<p>
    {{ $resume->resume_data['organisations']['name'] ?? '' }}
    ({{ $resume->resume_data['organisations']['from'] ?? '' }} -
     {{ $resume->resume_data['organisations']['to'] ?? '' }})
</p>

</body>
</html>
