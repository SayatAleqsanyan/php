function sendRequest() {
  fetch('/backend')
  .then(response => response.text())
  .then(data => {
    document.getElementById('result').textContent = data;
  })
  .catch(error => {
    console.error('Error:', error);
  });
}

let button = document.querySelectorAll('.button');
button.forEach(button => {
  button.addEventListener('click', () => {
    let container = button.parentNode;
    let input = container.querySelector('.input');
    let result = container.querySelector('.result');

    result.textContent = input.value;
  });
});