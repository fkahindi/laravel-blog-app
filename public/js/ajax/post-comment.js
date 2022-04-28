import { cache } from "browserslist";

$('document').ready(function() {
    let form = $('#comment-post-form');
    let user_id = $('#user_id').val();
    let post_id = $('#post_id').val();
    let comment = $('$comment').val();

    $(form).on('submit', function(e) {
        e.preventDefault();
        var url = $(this).attr('data-action');

        if (comment == '') {
            return false;
        }
        if (user_id === '') {
            return window.location.href = "/login";
        }

        let data = {
            'submit_comment': 1,
            'user_id': user_id,
            'post_id': post_id,
            'body': comment
        }
        $.ajax({
            url: url,
            method: 'POST',
            data: new FormData(this),

            success: function(response) {
                $(form).trigger('reset');
                $('#comment-area').preppend(data);
            }
        });
    });
});