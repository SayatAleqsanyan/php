$('.post_like').on('click', function () {
    let parent = $(this).closest('.card-footer');
    let user_id = parent.find('input[name="user_id"]').val();
    let id = parent.find('input[name="post_id"]').val();

    fetch('../action/like.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({user_id: user_id, id: id})
    })
        .then(res => {
            return res.json();
        })
        .then(data => {
            let parent = $(this).closest('.card-footer');
            parent.find('.like_count').html(" Count: "+data.data.count_like);
        })
        .catch(error => console.log( error));
});

