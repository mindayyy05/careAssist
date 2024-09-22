@extends('layouts.app')

@section('content')
    <style>
        .message-page {
            display: flex;
            height: 100vh;
            /* Full viewport height */
        }

        .user-list-container {
            width: 25%;
            /* Sidebar width */
            border-right: 1px solid #ddd;
            overflow-y: auto;
            background-color: #ffffff;
            padding: 20px;
        }

        .intro-text {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }

        .intro-icon {
            display: block;
            margin: 0 auto 10px;
            width: 50px;
            height: 50px;
        }

        .user-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .user-item {
            padding: 15px;
            cursor: pointer;
            border-bottom: 1px solid #ddd;
        }

        .user-item:hover {
            background-color: #f0f0f0;
        }

        .chat-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .placeholder {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            background-color: #f0f0f0;
        }

        .placeholder-icon {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }

        .placeholder-text {
            font-size: 20px;
            color: #888;
        }

        .messages-container {
            flex: 1;
            /* Takes the remaining space */
            overflow-y: auto;
            padding: 15px;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
        }

        .message {
            max-width: 60%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 15px;
            display: block;
            clear: both;
        }

        .message.babysitter {
            background-color: #007bff;
            align-self: flex-end;
            color: white;
        }

        .message.user {
            background-color: #ffffff;
            align-self: flex-start;
        }

        .message-input-container {
            padding: 10px;
            border-top: 1px solid #ddd;
            display: flex;
            align-items: center;
            background-color: white;
        }

        .message-input {
            flex: 8;
            /* Increased width for input */
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 20px;
            margin-right: 10px;
        }

        .btn-send {
            flex: 1;
            /* Reduced width for button */
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-send:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="message-page">
        <!-- User List Container -->
        <div class="user-list-container">
            <!-- Introductory Section -->

            <div class="intro-text">Select a user to start chatting</div>

            <ul class="user-list">
                @foreach ($users as $user)
                    <li class="user-item" onclick="loadChat({{ $user->id }})">{{ $user->name }}</li>
                @endforeach
            </ul>
        </div>

        <!-- Chat Area -->
        <div class="chat-area" id="chat-area">
            <!-- Placeholder Section -->
            <div class="placeholder" id="placeholder">
                <img src="{{ asset('images/chat.jpeg') }}" alt="Placeholder Icon" class="placeholder-icon">

                <div class="placeholder-text">Select a user to view messages</div>
            </div>

            <!-- Messages Container -->
            <div class="messages-container" id="chat-container" style="display: none;">
                @foreach ($chats as $chat)
                    <div class="message {{ $chat->who_sent }}">
                        <p>{{ $chat->message }}</p>
                    </div>
                @endforeach
            </div>

            <!-- Message Input Area -->
            <div class="message-input-container">
                <form id="message-form" class="message-form">
                    @csrf
                    <input type="text" id="message" name="message" placeholder="Type a message" class="message-input"
                        required>
                    <button type="button" id="send-button" class="btn-send">Send</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function loadChat(userId) {
            // Fetch the chat messages for the selected user
            console.log("Load chat for user:", userId);

            // Hide placeholder and show chat container
            document.getElementById('placeholder').style.display = 'none';
            document.getElementById('chat-container').style.display = 'flex';

            // Display the chat area
            document.getElementById('chat-area').style.display = 'flex';

            // Here you can make an AJAX request to fetch the messages for the selected user
            // For example:
            // fetch(`/chat/${userId}`)
            //     .then(response => response.json())
            //     .then(data => {
            //         // Update the chat container with the fetched messages
            //     });
        }

        $(document).ready(function() {
            $('#send-button').on('click', function(e) {
                e.preventDefault();
                var message = $('#message').val();

                // Trim the message to avoid spaces only
                if (message.trim() === '') return;

                // Convert message to lowercase for case-insensitive comparison
                var lowerCaseMessage = message.toLowerCase();

                // Check for restricted words
                if (lowerCaseMessage.includes('shit') || lowerCaseMessage.includes('die')) {
                    console.error('Message not sent due to privacy reasons');
                    alert('Message not sent due to privacy reasons');
                    return;
                }

                $.ajax({
                    url: "{{ route('babysitter_message.store') }}",
                    method: 'POST',
                    data: {
                        _token: $('input[name="_token"]').val(),
                        message: message
                    },
                    success: function(response) {
                        // Append the new message to the chat container
                        $('#chat-container').append('<div class="message babysitter"><p>' +
                            message + '</p></div>');
                        $('#message').val('');
                        $('#chat-container').scrollTop($('#chat-container')[0].scrollHeight);
                    },
                    error: function(xhr) {
                        console.error('Error sending message:', xhr);
                    }
                });
            });
        });
    </script>
@endsection
