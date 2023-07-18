@include('layouts.header')
@include('layouts.footer')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMS</title>
    <link rel="stylesheet" href="{{ asset('css/projects.blade.css') }}">
</head>
<body>
@can('create-project')
<div class="create-project">
    <!-- Project creation form or button -->
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <!-- Add your project creation form fields here -->
        <input type="text" name="title" placeholder="Project Title">
        <textarea name="description" placeholder="Project Description"></textarea>
        <button type="submit">Create Project</button>
    </form>
</div>
@endcan

<div class="project-list">
    @foreach ($projects as $project)
        <div class="project-item">
            <div class="thumbnail">
                <!-- Add your thumbnail image here -->
                <img src="{{ $project->thumbnail }}" alt="Thumbnail">
            </div>
            <div class="project-details">
                <h3 class="project-title">{{ $project->title }}</h3>
                <!-- Add other project details here -->
                <p class="project-description">{{ $project->description }}</p>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
