tinymce.init({
    selector: '#mytextarea',
    language: 'fr_FR',
    plugins : 'image',
    menubar: 'file insert',
    removed_menuitems: 'newdocument',
    toolbar : 'fontfamily fontsize bold italic underline forecolor backcolor indent outdent lineheight  alignleft aligncenter alignright alignjustify undo redo cuts',
    statusbar: false,
});
