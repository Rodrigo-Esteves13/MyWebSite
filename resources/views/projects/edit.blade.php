@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/projects.blade.css') }}">

<div class="editProject-Container">
    <h1>Edit Project</h1>
    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Add your project edit form fields here -->
        <div class="form-group">
            <label for="title">Project Title:</label>
            <input type="text" name="title" id="title" value="{{ $project->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Project Description:</label>
            <textarea name="description" id="description" required>{{ $project->description }}</textarea>
        </div>
        <button type="submit">Save Changes</button>
    </form>
    <form action="{{ route('projects.destroy', $project->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this project?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-button">Delete Project</button>
    </form>
</div>

@include('layouts.footer')