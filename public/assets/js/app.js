// Mostrar el formulario para crear un post
$(document).ready(function() {
    const newPostModal = $("#newPostModal");
    $(".fab").click(function(event) {
        event.preventDefault();
        newPostModal.modal('show');
    });
});