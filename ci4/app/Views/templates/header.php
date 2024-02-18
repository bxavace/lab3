<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- minify -->
    <link href="https://unpkg.com/nes.css@2.3.0/css/nes.min.css" rel="stylesheet" />
    <!-- latest -->
    <link href="https://unpkg.com/nes.css@latest/css/nes.min.css" rel="stylesheet" />
    <!-- core style only -->
    <link href="https://unpkg.com/nes.css/css/nes-core.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <title>Brylle Ace Nunez</title>
    <script type="text/javascript" src="<?=base_url()?>script/script.js" defer></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"
      integrity="sha512-z4OUqw38qNLpn1libAN9BsoDx6nbNFio5lA6CuTp9NlK83b89hgyCVq+N5FdBJptINztxn1Z3SaKSKUS5UP60Q=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <link rel="stylesheet" href="<?=base_url()?>styles.css">
</head>
<body>
    <header class="header">
        <nav class="nav">
            <ul class="nav-list">
                <li class="nav-item"><a href="<?= base_url('home') ?>" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="<?= base_url('about') ?>" class="nav-link">About</a></li>
                <li class="nav-item"><a href="<?= base_url('contact') ?>" class="nav-link">Contact</a></li>
                <li class="nav-item"><a href="<?= base_url('projects') ?>" class="nav-link">Projects</a></li>
            </ul>
        </nav>
    </header>
    <i class="nes-charmander nes-pointer animate__animated animate__pulse animate__infinite"></i>
    <div class="chat-message nes-container">
        <p class="title">Charmander</p>
        <div class="message-list">
            <div class="nes-balloon from-right first-message">
            <p>Hi, I'm Charmander. I'm here to help you. What do you want to know?</p>
            </div>
        </div>
        <div class="nes-field">
            <label for="msg-field">Message...</label>
            <input type="text" id="msg-field" class="nes-input">
            <br>
            <button class="nes-btn is-warning" onclick="sendMessage()">Send</button>
            <button class="nes-btn is-error" onclick="clearChat()">Clear</button>
        </div>
    </div>
    <style>
        .nes-charmander {
            position: fixed;
            bottom: 3.5rem; 
            right: 3.5rem;
            z-index: 999;
        }
        .chat-message {
            display: none;
            position: absolute;
            bottom: 5rem;
            right: 10rem;
            width: 500px;
            background-color: #f8f8f8;
            height: 350px;
            overflow-y: auto;
            display: none;
        }   
    </style>

    <script>
        document.querySelector('.nes-charmander').addEventListener('click', function() {
            var chatMessage = document.querySelector('.chat-message');
            chatMessage.style.display = chatMessage.style.display === 'none' ? 'block' : 'none';
            if (chatMessage.style.display === 'block') {
                document.getElementById('msg-field').focus();
            }
        });

        function sendMessage() {
            var userInput = document.getElementById('msg-field').value;
            // clear the input field
            displayUserMessage(userInput);
            getCharmanderResponse(userInput);
            document.getElementById('msg-field').value = '';
        }

        function displayUserMessage() {
            var userMessage = document.getElementById('msg-field').value;
            var userMessageElement = document.createElement('div');
            userMessageElement.classList.add('nes-balloon');
            userMessageElement.classList.add('from-left');
            userMessageElement.innerHTML = '<p>' + userMessage + '</p>';
            userMessageElement.style.display = 'block';
            document.querySelector('.message-list').appendChild(userMessageElement);
        }

        function displayCharmanderResponse(charmanderResponse) {
            var charmanderMessageElement = document.createElement('div');
            charmanderMessageElement.classList.add('nes-balloon');
            charmanderMessageElement.classList.add('from-right');
            charmanderMessageElement.innerHTML = '<p>' + charmanderResponse + '</p>';
            charmanderMessageElement.style.display = 'block';
            document.querySelector('.message-list').appendChild(charmanderMessageElement);
        }
    
        function getCharmanderResponse(userInput) {
            var requestData = {
                contents: [{
                    parts: [{
                        text: "You are Charmander, a cute pokemon. STRICLY: Only reply what Charmander would most likely reply. That is, a bunch of onomatopoeaic words. User input: " + userInput
                    }]
                }]
            };

            var apiKey = 'AIzaSyD4QTtOyIeVd69xEMWkhTbDMaCfN4pfXyQ';
            
            fetch('https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=' + apiKey, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(requestData),
            })
            .then(response => response.json())
            .then(data => {
                // Extract the generated response from the API response
                var generatedResponse = data.candidates[0].content.parts[0].text;
                displayCharmanderResponse(generatedResponse);
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        }

        function clearChat() {
            document.querySelector('.message-list').innerHTML = '';
        }
    </script>