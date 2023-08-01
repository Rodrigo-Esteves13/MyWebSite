@include('layouts.header')
@include('layouts.footer')
<!-- resources/views/chat.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Real-Time Chat</title>
    <script src="https://js.pusher.com/8.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('d5ebdc0e2671d21f8bef', {
            cluster: 'eu',
            encrypted: true
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            var chatDiv = document.getElementById('chat-messages');
            var message = data.user + ': ' + data.message;
            var p = document.createElement('p');
            p.textContent = message;
            chatDiv.appendChild(p);
        });

        function sendMessage() {
            var messageInput = document.getElementById('message-input');
            var message = messageInput.value;

            // Send the message to the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '/send-message');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Message sent successfully
                        messageInput.value = '';
                    } else {
                        alert('Failed to send message. Please try again.');
                    }
                }
            };
            xhr.send('message=' + encodeURIComponent(message));
        }
    </script>
</head>
<body>
    <h1>Real-Time Chat</h1>
    <div id="chat-messages"></div>
    <input type="text" id="message-input" placeholder="Type your message">
    <button onclick="sendMessage()">Send</button>
</body>
</html>
