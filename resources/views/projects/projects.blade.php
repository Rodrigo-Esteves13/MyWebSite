@include('layouts.header')
@include('layouts.footer')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMS</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/projects.blade.css') }}">
    <link href="{{ asset('css/trix.css') }}" rel="stylesheet">
    <!-- In the <head> section -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js"></script>
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
                <h3 class="project-title">{{ $project->title }}</h3>
                <p>{!! $project->description !!}</p>
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



<div id="projectModal" class="modal">
    <div class="modal-content">
        <!-- Project creation form -->
        <form id="createProjectForm" enctype="multipart/form-data">
            <!-- Add your project creation form fields here -->
            <label for="thumbnail">Thumbnail:</label>
            <input type="file" name="thumbnail" id="thumbnail"><br>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required><br>
            <div class="form-group">
                <label for="description">Project Description</label>
                <!-- Use Trix input for description -->
                <input id="description" type="hidden" name="description" value="">
                <trix-editor input="description"></trix-editor>
            </div>
            <!-- Add more fields if needed -->
            <button type="submit">Create Project</button>
        </form>
    </div>
</div>

<script src="{{ asset('js/trix.js') }}"></script>
<script src="{{ asset('js/trix_custom.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@rails/actiontext"></script>
<script>
    // Handle Trix editor's changes to update the hidden description input
    const trixEditor = document.querySelector("trix-editor");
    const descriptionInput = document.getElementById("description");

    trixEditor.addEventListener("trix-change", function(event) {
        // Update the hidden input with the Trix editor's plain text content
        descriptionInput.value = trixEditor.innerText;
    });

    // Allow only image attachments in Trix editor
    document.addEventListener("trix-file-accept", function(event) {
        const acceptedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        const maxFileSize = 5 * 1024 * 1024; // 5MB

        if (!acceptedTypes.includes(event.file.type) || event.file.size > maxFileSize) {
            event.preventDefault();
            alert("Please upload a valid image (JPEG, PNG, JPG, or GIF) with a maximum size of 5MB.");
        }
    });

    // Handle Trix editor's attachment uploads
    document.addEventListener("trix-attachment-add", function(event) {
        const attachment = event.attachment;

        if (attachment.file) {
            // Read the file data as a data URL
            const reader = new FileReader();

            reader.addEventListener("load", function() {
                // Create a Trix attachment with the data URL
                const imageUrl = reader.result;
                attachment.setAttributes({
                    url: imageUrl
                });

                // Insert the attachment into the Trix editor
                trixEditor.editor.insertAttachment(attachment);
            });

            reader.readAsDataURL(attachment.file);
        }
    });
</script>
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
<script>
    const projectStoreRoute = "{{ route('projects.store') }}";
    const createProjectForm = document.getElementById("createProjectForm");
    createProjectForm.addEventListener("submit", function(event) {
        event.preventDefault();
        const formData = new FormData(createProjectForm);

        axios.post(projectStoreRoute, formData)
        .then(function(response) {
            // Handle the successful response, e.g., show a success message

            // Optionally, you can reload the page or update the projects list after project creation
            location.reload();
        })
        .catch(function(error) {
            // Handle the error response, e.g., show an error message
            alert('Error creating project. Please try again.');
        });
    });

</script>
</body>
</html>
