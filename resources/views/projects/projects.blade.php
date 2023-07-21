<!-- projects.blade.php -->

@include('layouts.header')
@include('layouts.footer')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMS</title>
    <link rel="stylesheet" href="{{ asset('css/projects.blade.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/trix.css') }}" rel="stylesheet">
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
    <!-- Button to open the modal -->
    <button id="openModalButton">Add</button>
</div>
@endcan

<div class="project-list">
    @foreach ($projects as $project)
        <a href="{{ route('projects.show', ['id' => $project->id]) }}">View Project</a>
            <div class="thumbnail">
                <!-- Add your thumbnail image here -->
                <img src="{{ $project->thumbnail }}" alt="Thumbnail">
            </div>
            <div class="project-details">
                <h3 class="project-title">{{ $project->title }}</h3>
            </div>
        </a>
    @endforeach
</div>
</div>

<div id="projectModal" class="modal">
        <div class="modal-content">
            <!-- Project creation form -->
            <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Add your project creation form fields here -->
                <label for="thumbnail">Thumbnail:</label>
                <input type="file" name="thumbnail" id="thumbnail" required><br>
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" required><br>
                <div class="form-group">
                    <label for="description">Project Description</label>
                <textarea name="description" id="description" rows="4" required></textarea><br>
                </div>
                <!-- Add more fields if needed -->
                <button type="submit">Create Project</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Script to open the modal
    const openModalButton = document.getElementById('openModalButton');
    const projectModal = document.getElementById('projectModal');

    openModalButton.addEventListener('click', () => {
        projectModal.style.display = 'block';
    });

    // Script to close the modal when clicking outside of it
    window.addEventListener('click', (event) => {
        if (event.target === projectModal) {
            projectModal.style.display = 'none';
        }
    });
</script>
<script src="{{ asset('js/trix.js') }}"></script>

</body>
</html>
