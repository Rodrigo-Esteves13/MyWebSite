<!-- resources/views/projects.blade.php -->
@include('layouts.header')
@include('layouts.footer')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>REMS</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/projects.blade.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
</head>
<body>
<div class="projects-container">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @can('create-project')
    <div class="create-project">
        <button id="openModalButton">Add <i class="fas fa-plus"></i></button>
    </div>
    @endcan

    <div class="project-list">
        @foreach ($projects as $project)
            <a href="{{ route('projects.show', ['id' => $project->id]) }}" class="project-item">
                <div class="thumbnail">
                    <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}">
                </div>
                <div class="project-details">
                    <h3 class="project-title">{{ $project->title }}</h3><br>
                    @if (auth()->check() && auth()->user()->isAdmin())
                        <form action="{{ route('projects.edit', ['id' => $project->id]) }}" method="GET">
                            <button type="submit" class="edit-button">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </form>
                    @endif
                </div>
            </a>
        @endforeach
    </div>
</div>

<div id="projectModal" class="modal">
    <div class="modal-content">
        <!-- Project creation form -->
        <form id="createProjectForm" action="{{ route('projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Add your project creation form fields here -->
            <label for="thumbnail">Thumbnail:</label>
            <input type="file" name="thumbnail" id="thumbnail"><br>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required><br>
            <div class="form-group">
                <label for="description">Project Description</label>
                <!-- Use Trix input for description -->
                <input type="hidden" name="description" id="description">
                <trix-editor input="description"></trix-editor>
            </div>
            <!-- Add more fields if needed -->
            <button type="submit">Create Project</button>
        </form>
    </div>
</div>
<script src="{{ asset('js/trix_custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@rails/actiontext"></script>
</body>
</html>
