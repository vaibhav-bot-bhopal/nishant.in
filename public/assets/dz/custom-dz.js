var total_photos_counter = 0;

Dropzone.options.myDropzone = {
    uploadMultiple: true,
    parallelUploads: 2,
    maxFilesize: 5,
    acceptedFiles: '.jpeg,.jpg,.png',
    previewTemplate: document.querySelector('#preview').innerHTML,
    addRemoveLinks: true,
    dictRemoveFile: 'Remove File',
    dictFileTooBig: 'Image is larger than 5MB.',
    timeout: 10000,

    init: function () {
        this.on("error", function (file, message) {
            toastr['error'](message);
        });
    },

    success: function (file, done) {
        total_photos_counter++;
        $("#counter").text("# " + total_photos_counter);
        toastr['success'](done.success);
    }
};
