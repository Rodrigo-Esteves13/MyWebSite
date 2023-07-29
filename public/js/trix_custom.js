document.addEventListener("trix-file-accept", function(event) {
    if (event.file) {
        // Read the file data as a data URL
        const reader = new FileReader();
        reader.readAsDataURL(event.file);

        reader.onload = function() {
            // Create a Trix attachment using the data URL
            const attachment = new Trix.Attachment({
                url: reader.result,
            });

            // Add the attachment to the Trix editor
            event.target.editor.insertAttachment(attachment);
        };

        // Prevent Trix from handling the file
        event.preventDefault();
    }
});
