@include('layouts.header')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMS - Project Details</title>
    <link rel="stylesheet" href="{{ asset('css/project-details.blade.css') }}"> <!-- Add the new CSS file -->
</head>
<body>
    <div class="project-details-container">
        <div class="project-details">
            <h1 class="project-title">{{ $project->title }}</h1>
            <p class="project-description">{{ $project->description }}</p>
            <!-- Add other project details here -->
        </div>
    </div>

    @include('layouts.footer')
</body>
</html>
