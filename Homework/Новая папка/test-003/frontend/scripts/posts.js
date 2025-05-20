function getCookieValue(name) {
  const cookies = document.cookie.split('; ');
  for (let cookie of cookies) {
    const [key, value] = cookie.split('=');
    if (key === name) {
      return value;
    }
  }
  return null;
}

const POSTS_CONTAINER = document.getElementById('posts-container');
const getPosts = async () => {
  POSTS_CONTAINER.innerHTML = '';

  try {
    const response = await fetch('/backend/', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        action: 'get-posts',
        user_id: getCookieValue('token')
      })
    });

    const data = await response.json();

    if (Array.isArray(data) && data.length > 0) {
      data.forEach((post) => {
        console.log(post);
        let classLike = 'post-like';
        let classDislike = 'post-dislike';
        console.log(post.additional_data);
          if (post.additional_data == '1') {
            classLike += ' active';
          } else if (post.additional_data == '2') {
            classDislike += ' active';
          }
        const postElement = document.createElement('div');
        postElement.classList.add('post-item');
        postElement.innerHTML = `
          <div class="content">
            <button class="post-edit" data-post-id="${post.post_id}" data-user-id="${post.user_id}"> Edit </button>
            <button class="post-delete" data-post-id="${post.post_id}" data-user-id="${post.user_id}"> Delete </button>
            
            <h3>${post.post_title} </h3>
            <h3>${post.login} </h3>
            <p>${post.post_add_date}</p>
            <p>${post.post_body}</p>
            
            <button class="${classLike}" data-post-id="${post.post_id}" data-user-id="${post.user_id}"> Like </button>
            <button class="${classDislike}" data-post-id="${post.post_id}" data-user-id="${post.user_id}"> Dislike </button>
          </div> 
        `;
        POSTS_CONTAINER.prepend(postElement);
      });

      const likeButtons = document.querySelectorAll('.post-like');
      likeButtons.forEach((button) => {
        button.addEventListener('click', async () => {
          const postId = button.dataset.postId;
          const userId = getCookieValue('token');

          try {
            const response = await fetch('/backend/', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json'
              },
              body: JSON.stringify({
                action: 'like-post',
                post_id: postId,
                user_id: userId
              })
            });

            if (response.ok) {
              const data = await response.json();
              button.classList.toggle('liked-active');

              getPosts();
            }

          } catch (error) {
            console.error('Error:', error);
          }
        });
      });

      const dislikeButtons = document.querySelectorAll('.post-dislike');
      dislikeButtons.forEach((button) => {
        button.addEventListener('click', async () => {
          const postId = button.dataset.postId;
          const userId = getCookieValue('token');

          try {
            const response = await fetch('/backend/', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json'
              },
              body: JSON.stringify({
                action: 'dislike-post',
                post_id: postId,
                user_id: userId
              })
            });

            if (response.ok) {
              const data = await response.json();
              button.classList.toggle('disliked-active');

              getPosts();
            }

          } catch (error) {
            console.error('Error:', error);
          }
        });
      });

      const editButtons = document.querySelectorAll('.post-edit');
      editButtons.forEach((button) => {
        button.addEventListener('click', async () => {
          const postId = button.dataset.postId;
          const userId = getCookieValue('token');

          try {
            const response = await fetch('/backend/', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json'
              },
              body: JSON.stringify({
                action: 'edit-post',
                post_id: postId,
                user_id: userId
              })
            });

            if (response.ok) {
              const data = await response.json();
              button.classList.toggle('edited-active');

              getPosts();
            }

          } catch (error) {
            console.error('Error:', error);
          }
        });
      });

      const deleteButtons = document.querySelectorAll('.post-delete');
      deleteButtons.forEach((button) => {
        button.addEventListener('click', async () => {
          const postId = button.dataset.postId;
          const userId = getCookieValue('token');

          try {
            const response = await fetch('/backend/', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json'
              },
              body: JSON.stringify({
                action: 'delete-post',
                post_id: postId,
                user_id: userId
              })
            });

            if (response.ok) {
              const data = await response.json();
              button.classList.toggle('deleted-active');

              getPosts();
            }

          } catch (error) {
            console.error('Error:', error);
          }
        });
      });
    } else {
      alert('No posts found');
    }
  } catch (error) {
    console.error('Posts Error:', error);
  }
};

getPosts();


addPost = document.getElementById('post-form');
addPost.addEventListener('submit', async (e) => {
  e.preventDefault();
  try {
    const response = await fetch('/backend/', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },

      body: JSON.stringify({
        action: 'add-post',
        title: addPost.title.value,
        body: addPost.body.value,
        user_id: getCookieValue('token')
      })
    });
    
    if (response.ok) {
      addPost.title.value = '';
      addPost.body.value = '';
      getPosts();
    }
  } catch (error) {
    console.error('Error:', error);
  }
});
