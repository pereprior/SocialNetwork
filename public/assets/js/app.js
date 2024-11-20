// Mostrar el formulario para crear un post
$(document).ready(function() {
    const newPostModal = $("#newPostModal");
    $(".fab").click(function(event) {
        event.preventDefault();
        newPostModal.modal('show');
    });

    $(".comment-btn").click(function(event) {
        event.preventDefault();
        document.getElementById('comment-form').classList.toggle('visibility-none')
    });


});