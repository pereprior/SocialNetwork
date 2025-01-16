// Mostrar el formulario para crear un post
$(document).ready(function() {

    /* Muestra la ventana con el formulario para crear un nuevo post */
    const newPostModal = $("#newPostModal");
    $(".fab").click(function(event) {
        event.preventDefault();
        newPostModal.modal('show');
    });

    /* Muestra la ventana con el formulario para añadir un comentario */
    const newCommentModal = $("#newCommentModal");
    $(".comment-btn").click(function(event) {
        event.preventDefault();
        newCommentModal.modal('show');
    });
    newCommentModal.on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
    });
    /* Gestiona la lógica para que el comentario se asigne correctamente al post y se vea inmediatamente */
    $("#commentForm").submit(function(event) {
        event.preventDefault();
        const form = this;
        $.ajax({
            type: $(form).attr('method'),
            url: $(form).attr('action'),
            data: $(form).serialize(),
            success: function() {
                form.reset();
                newCommentModal.modal('hide');
                window.location.reload();
            },
            error: function() {
                alert('Error al enviar el comentario');
            }
        });
    });

    /* Gestiona la lógica del botón de likes de un post */
    $(".like-btn").click(function(event) {
        event.preventDefault();
        const postId = $(this).data('post-id');
        const likeBtn = $(this);

        $.ajax({
            url: `/like/${postId}`,
            method: 'POST',
            success: function(response) {
                likeBtn.find('i').toggleClass('bi-heart bi-heart-fill');
                likeBtn.find('span').text(response.likes);
            },
            error: function() {
                alert('Error liking the post.');
            }
        });
    });

    /* Muestra el menu con las opciones adicionales de un post */
    $(".icn-btn").click(function(event) {
        event.stopPropagation();
        const postId = $(this).attr('id').split('-')[2];
        const dropdownMenu = $(`#dropdown-${postId}`);
        dropdownMenu.toggleClass("show");
    });
    $(document).click(function() {
        $(".dropdown.show").removeClass("show");
    });

    /* Gestiona la lógica para eliminar un post */
    $(".delete-btn").click(function (event) {
        event.preventDefault();
        const postId = $(this).data('post-id');

        const request = $.ajax({
            url: `/post/delete/${postId}`,
            method: 'POST'
        });

        request.done(function() {
            window.location.reload();
        });

        request.fail(function(jqXHR, textStatus, errorThrown) {
            console.error("Error details:", textStatus, errorThrown);
            console.error("Response text:", jqXHR.responseText);
            alert("Error al eliminar el post");
        });

    });
});

/* Muestra primero los chats más recientes */
document.addEventListener("DOMContentLoaded", function() {
    const chatList = document.getElementById("chatList");
    if (chatList) {
        chatList.scrollTop = chatList.scrollHeight;
    }
});