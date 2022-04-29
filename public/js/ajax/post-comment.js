$('document').ready(function() {
    const method = 'POST';
    const path = "{{ route('comment.post ') }}";
    let submit = $('#submit');
    let user_id = $('#user_id').val();
    let post_id = $('#post_id').val();
    let comment = $('$comment').val();

    $(submit).on('click', function(e) {
        e.preventDefault();
        alert('You clicked submit');
        /* e.preventDefault();
        var url = $(this).attr('data-action');

        if (comment == '') {
            return false;
        }
        if (user_id === '') {
            return window.location.href = "/login";
        }

        let data = {
            'user_id': user_id,
            'post_id': post_id,
            'body': comment
        }
        let res = (response) => {
            $('#comments-area').prepend(data);
            comment = "";
            res.forEach(element => {
                document.writeln(element);
            });
        }
        ajax(data, res); */
    });

    const ajax = async(data, res) => {
        await $.ajax({
            url: path,
            type: method,
            data: data,
            success: res

        });
    }

});
