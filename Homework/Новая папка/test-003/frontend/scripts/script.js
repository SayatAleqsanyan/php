function getCookie(name) {
  const cookies = document.cookie.split('; ');
  for (let cookie of cookies) {
    const [cookieName, cookieValue] = cookie.split('=');
    if (cookieName === name) {
      return decodeURIComponent(cookieValue);
    }
  }
  return null;
}

const userToken = getCookie('token');
if (!userToken) {
  window.location.replace("login.html");
}

// ----- LOGOUT ----------------------------------------------------------

let LOGOUT = document.getElementById('logout');
LOGOUT.addEventListener('click', async (e) => {
  e.preventDefault();
    try {
      const response = await fetch('/backend/', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          action: 'logout'
        })
      });

      const data = await response.json();
      if (data.message === 'success') {
        window.location.replace("login.html");
      } else {
        alert('Logout Error ' + data.message);
      }
    } catch (error) {
      console.error('Logout Error:', error);
    }
});


