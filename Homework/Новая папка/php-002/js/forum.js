function scrollToBottom() {
  const messagesContainer = document.querySelector('.messages');
  messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

document.addEventListener('DOMContentLoaded', scrollToBottom);

function addNewMessage() {
  scrollToBottom();
}