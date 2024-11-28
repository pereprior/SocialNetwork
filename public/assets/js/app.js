// Mostrar el formulario para crear un post
$(document).ready(function() {
    const newPostModal = $("#newPostModal");
    $(".fab").click(function(event) {
        event.preventDefault();
        newPostModal.modal('show');
    });

    $(".post-card").click(function(event) {
        event.preventDefault();
        const postId = $(this).data('post-id');
        window.location.href = `/post/${postId}`;
    });

    $(".comment-btn").click(function(event) {
        event.preventDefault();
        document.getElementById('comment-form').classList.toggle('visibility-none')
    });

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
});