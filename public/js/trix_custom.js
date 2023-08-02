document.addEventListener("DOMContentLoaded", function () {
    const createProjectForm = document.getElementById("createProjectForm");
    const trixEditor = document.querySelector("trix-editor");
    const openModalButton = document.getElementById('openModalButton');
    const projectModal = document.getElementById('projectModal');
    const projectStoreRoute = "/projects/upload/image"; // Replace with the correct URL

    if (createProjectForm) {
        createProjectForm.addEventListener("submit", function (event) {
            event.preventDefault();
    
            const formData = new FormData(createProjectForm);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
            formData.append('_token', csrfToken); // Add the CSRF token to the form data
    
            axios.post(projectStoreRoute, formData, {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            })
            .then(function(response) {
                if (response.data.success) {
                    location.reload();
                } else {
                    alert('Error creating project. Please try again.');
                }
            })
            .catch(function(error) {
                alert('Error creating project. Please try again.');
            });
        });
    
        trixEditor.addEventListener("trix-attachment-add", function(event) {
            handleAttachmentUploads(event, projectStoreRoute);
        });
    }

    // Allow only image attachments in Trix editor
    document.addEventListener("trix-file-accept", function (event) {
        const acceptedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        const maxFileSize = 5 * 1024 * 1024; // 5MB

        if (!acceptedTypes.includes(event.file.type) || event.file.size > maxFileSize) {
            event.preventDefault();
            alert("Please upload a valid image (JPEG, PNG, JPG, or GIF) with a maximum size of 5MB.");
        }
    });

    // Open modal
    openModalButton.addEventListener('click', () => {
        projectModal.style.display = 'block';
    });

    // Close modal
    window.addEventListener('click', (event) => {
        if (event.target === projectModal) {
            projectModal.style.display = 'none';
        }
    });

    function handleAttachmentUploads(event, uploadRoute) {
        const attachment = event.attachment;
        if (attachment.file) {
            const formData = new FormData();
            formData.append('file', attachment.file);
    
            axios.post(uploadRoute, formData, {
                headers: {
                    "Content-Type": "multipart/form-data"
                }
            })
            .then(function(response) {
                if (response.data.success) {
                    attachment.setAttributes({
                        url: response.data.file.url,
                        href: response.data.file.url
                    });
                } else {
                    alert('Error uploading image. Please try again.');
                }
            })
            .catch(function(error) {
                alert('Error uploading image. Please try again.');
            });
        }
    }
});
