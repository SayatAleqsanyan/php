function validateForm(form) {
  let result = true;

  const INPUTS = form.querySelectorAll('input');
  INPUTS.forEach(input => {
    removeError(input);
    const inputIsValid = validate(input);
    if (!inputIsValid) result = false;
  });

  return result;
}

function validate(input) {
  const value = input.value.trim();
  const name = input.name;
  let valid = true;

  if (!value) {
    createError(input, 'Field is required');
    valid = false;
  } else if (name === 'login') {
    const usernameRegex = /^[a-zA-Z0-9]{4,}$/;
    if (!usernameRegex.test(value)) {
      createError(input, 'Login: at least 4 characters');
      valid = false;
    }
  } else if (name === 'password') {
    const passwordRegex = /^[a-zA-Z0-9]{4,}$/; //    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{6,}$/;
    if (!passwordRegex.test(value)) {
      createError(input, 'Password: at least 4 characters');
      valid = false;
    }
  } else if (name === 'repeat_password') {
    const passwordInput = input.form.querySelector('input[name="password"]');
    if (passwordInput && passwordInput.value !== value) {
      createError(input, 'Does not match password');
      valid = false;
    }
  } else if (name === 'email') {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(value)) {
      createError(input, 'Invalid email address');
      valid = false;
    }
  }

  return valid;
}

function removeError(input) {
  const parent = input.parentNode;

  if (parent.classList.contains('error')) {
    const label = parent.querySelector('.error-label');
    if (label) label.remove();
    parent.classList.remove('error');
  }
}

function createError(input, message) {
  const parent = input.parentNode;

  parent.classList.add('error');

  const errorLabel = document.createElement('label');
  errorLabel.classList.add('error-label');
  errorLabel.textContent = message;
  parent.appendChild(errorLabel);
}
