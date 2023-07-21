<!-- show.blade.php -->

@include('layouts.header')
@include('layouts.footer')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMS - Project Details</title>
    <link rel="stylesheet" href="{{ asset('css/project-details.blade.css') }}">
</head>
<body>
    <div class="project-details-container">
        <div class="thumbnail">
            <!-- Add your thumbnail image here -->
            <img src="{{ $project->thumbnail }}" alt="Thumbnail">
        </div>
        <div class="project-details">
            <h1 class="project-title">{{ $project->title }}</h1>
            <p class="project-description">{{ $project->description }}</p>
            <!-- Add other project details here -->
        </div>
    </div>
</body>
</html>
