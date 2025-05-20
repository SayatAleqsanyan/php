// -------- login and register form toggle ----------------------------------

const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');

registerBtn.addEventListener('click', () => {
  container.classList.add('active');
});

loginBtn.addEventListener('click', () => {
  container.classList.remove('active');
});

// -------- check if user is logged in --------------------------------------

window.addEventListener('DOMContentLoaded', () => {
  const userToken = getCookie('token');
  if (userToken) {
    window.location.replace("index.html");
  }
});

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

// -------- user login ------------------------------------------------------

const LOGIN_FORM = document.getElementById('login-form');
LOGIN_FORM.addEventListener('submit', async (e) => {
  e.preventDefault();
  if (validateForm(LOGIN_FORM) === true) {
    const login = LOGIN_FORM.querySelector('.login').value;
    const password = LOGIN_FORM.querySelector('.password').value;

    try {
      const response = await fetch('/backend/', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          action: 'login',
          login: login,
          password: password
        })
      });

      const data = await response.json();
      if (data.message === 'success') {
        window.location.replace("index.html");
      } else {
        alert('Invalid login or password');
      }
    } catch (error) {
      console.error('Login Error:', error);
    }
  }
});

// -------- user register ---------------------------------------------------

const REGISTRATION_FORM = document.getElementById('registration-form');
REGISTRATION_FORM.addEventListener('submit', async (e) => {
  e.preventDefault();
  if (validateForm(REGISTRATION_FORM) === true) {
    const login = REGISTRATION_FORM.querySelector('.login').value;
    const email = REGISTRATION_FORM.querySelector('.email').value;
    const password = REGISTRATION_FORM.querySelector('.password').value;
    const repeat_password = REGISTRATION_FORM.querySelector('.repeat_password').value;

    try {
      const response = await fetch('/backend/', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          action: 'register',
          login: login,
          email: email,
          password: password,
          repeat_password:repeat_password
        })
      });

      const data = await response.json();
      if (data.message === 'success') {
        alert('Registration successful');
        container.classList.remove('active');
      } else {
        alert('Such a user already exists.');
      }
    } catch (error) {
      console.error('Registration Error:', error);
    }
  }
});
