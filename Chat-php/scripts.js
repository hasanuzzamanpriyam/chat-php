function sendMessage() {
    const username = document.getElementById('username').value;
    const message = document.getElementById('message').value;

    if (username && message) {
        const formData = new FormData();
        formData.append('username', username);
        formData.append('message', message);

        fetch('send_message.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            console.log(data);
            document.getElementById('message').value = '';
            fetchMessages();
        })
        .catch(error => console.error('Error:', error));
    }
}

function fetchMessages() {
    fetch('get_messages.php')
        .then(response => response.json())
        .then(data => {
            const chatBox = document.getElementById('chat-box');
            chatBox.innerHTML = '';

            data.forEach(message => {
                const messageElement = document.createElement('div');
                messageElement.classList.add('message');
                messageElement.innerHTML = `<strong>${message.username}:</strong> ${message.message}`;
                chatBox.appendChild(messageElement);
            });

            chatBox.scrollTop = chatBox.scrollHeight;
        })
        .catch(error => console.error('Error:', error));
}

// Fetch messages every 2 seconds
setInterval(fetchMessages, 2000);
