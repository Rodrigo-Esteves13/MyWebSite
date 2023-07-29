// resources/js/custom-trix.js

import Trix from 'trix';
import TrixAttachment from 'trix-attachment';

Trix.config.attachments.preview.caption = {
    name: false,
    size: false,
};

document.addEventListener('trix-attachment-add', (event) => {
    if (event.attachment.file) {
        const attachment = new TrixAttachment(event.attachment);
        event.attachment.setAttributes({
            url: attachment.fileURL,
            href: attachment.fileURL,
            caption: attachment.file.name,
        });
    }
});

document.addEventListener('trix-attachment-remove', (event) => {
    const attachment = event.attachment;
    // ... handle the removal of attachments if needed ...
});
document.addEventListener("trix-file-accept", function (event) {
    if (event.file) {
      // Read the file data as a data URL
      const reader = new FileReader();
      reader.readAsDataURL(event.file);
  
      reader.onload = function () {
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
  