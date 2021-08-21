$(document).ready(function() {
    $('#summernote').summernote({
        minHeight: 205,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['style', 'hr', 'color']],
            ['text', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
            ['link', ['link']],
            ['font', ['superscript', 'subscript']],
            ['fontsize', ['fontsize', 'height']],
            ['table', ['table']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['codeview', ['fullscreen', 'codeview', 'help']]
        ]
    });
});
