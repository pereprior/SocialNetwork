// Mostrar el formulario para crear un post
$(document).ready(function() {

    const newPostModal = $("#newPostModal");
    $(".fab").click(function(event) {
        event.preventDefault();
        newPostModal.modal('show');
    });

    const newCommentModal = $("#newCommentModal");
    $(".comment-btn").click(function(event) {
        event.preventDefault();
        newCommentModal.modal('show');
    });

    newCommentModal.on('hidden.bs.modal', function() {
        $(this).find('form')[0].reset();
    });

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

    /* Entrar dentro de los post */
    /*$(".post-card").click(function(event) {
        event.preventDefault();
        const postId = $(this).data('post-id');

        $(this).addClass('clicked-post');

        $.ajax({
            url: '/isLogged',
            method: 'GET',
            success: function(response) {
                if (response.loggedIn) {
                    window.location.href = `/post/${postId}`;
                } else {
                    window.location.href = `/login`;
                }
            },
            error: function() {
                alert('Error checking login status.');
            }
        });
    });*/

    /* Boton de like */
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

    /* Dropdown menu */
    $(".icn-btn").click(function(event) {
        event.stopPropagation();
        const postId = $(this).attr('id').split('-')[2];
        const dropdownMenu = $(`#dropdown-${postId}`);
        dropdownMenu.toggleClass("show");
    });
    $(document).click(function() {
        $(".dropdown.show").removeClass("show");
    });
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