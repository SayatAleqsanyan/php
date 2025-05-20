const ROOT = document.getElementById('root');

const DB_FETCH = function (serverName, method, data) {
  fetch(serverName, {
    method: method,
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
  .then(data => data.json())
  .then(json => {console.log(json)})
}

DB_FETCH('db.php', 'POST', {
  action: 1, name: 'test'
})

DB_FETCH('db.php', 'POST', {
  action: 1, name: 'test'
})



