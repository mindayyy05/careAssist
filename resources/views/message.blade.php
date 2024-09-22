@extends('layouts.app') <!-- Assuming you have a common layout file -->

@section('content')
    <style>
        .message-page {
            display: flex;
            flex-direction: column;
            height: 100vh;
            /* Full viewport height */
        }

        .messages-container {
            flex: 1;
            overflow-y: auto;
            padding: 15px;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .message {
            max-width: 60%;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 15px;
            display: block;
            clear: both;
        }

        .message.sent {
            background-color: #007bff;
            align-self: flex-end;
            color: white;
        }

        .message.received {
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
            flex: 4;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 20px;
            margin-right: 10px;
        }

        .btn-send {
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
        <!-- Messages Container -->
        <div class="messages-container">
            @foreach ($messages as $message)
                <div class="message {{ $message->who_sent == 'user' ? 'sent' : 'received' }}">
                    <p>{{ $message->message }}</p>
                </div>
            @endforeach
        </div>

        <!-- Message Input Area -->
        <div class="message-input-container">
            <form id="message-form" action="{{ route('messages.store') }}" method="POST" class="message-form">
                @csrf
                <input type="text" id="message" name="message" placeholder="Type a message" class="message-input"
                    required>
                <button type="submit" class="btn-send">Send</button>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('message-form').addEventListener('submit', function(e) {
            var message = document.getElementById('message').value.toLowerCase();

            // Check for restricted words
            if (message.includes('shit') || message.includes('die')) {
                console.error('Message not sent due to privacy reasons');
                alert('Message not sent due to privacy reasons');
                e.preventDefault(); // Prevent form submission
            }
        });
    </script>
@endsection
