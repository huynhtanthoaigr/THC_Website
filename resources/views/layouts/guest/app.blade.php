<!DOCTYPE html>
<html lang="en">

<head>
    <!-- meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- title -->
    <title>@yield('title', 'THC - Car Dealer And Automotive ')</title>

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo/favicon.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all-fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nice-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/flex-slider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    @stack('styles')
</head>

<body class="@yield('body-class', 'home-2')">

    <!-- preloader -->
    <div class="preloader">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- header -->
    @include('layouts.guest.header')
    <!-- header end -->

    <!-- sidebar-popup -->
    @include('layouts.guest.sidebar')
    <!-- sidebar-popup end -->

    <main class="main">
        @yield('content')
    </main>

    <!-- footer -->
    @include('layouts.guest.footer')
    <!-- footer end -->


    <!-- Chatbot UI -->
    <!--  <div id="chatbot-icon">
        <img src="{{ asset('assets/img/chatbot-icon.webp') }}" alt="Chatbot" onclick="toggleChatbot()">
    </div>
    -->

    <!-- Chatbot Box -->
    <div id="chatbot-box">
        <div class="chatbot-header">
            <span>Hỗ trợ trực tuyến</span>
            <div>
                <button onclick="chatbot.clearHistory()" title="Xóa lịch sử"><i class="fas fa-trash"></i></button>
                <button onclick="toggleChatbot()">✖</button>
            </div>
        </div>
        <div class="chatbot-body">
            <div class="chatbot-messages" id="chatbot-messages">
                <p class="bot-message">Xin chào! Tôi có thể giúp gì cho bạn?</p>
            </div>
        </div>
        <div class="chatbot-footer">
            <input type="text" id="chatbot-input" placeholder="Nhập tin nhắn..." onkeypress="handleKeyPress(event)">
            <button onclick="sendMessage()">Gửi</button>
        </div>
    </div>

    <!-- Chatbot CSS -->
    <style>
        /* Biểu tượng chatbot */
        #chatbot-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 70px;
            height: 70px;
            cursor: pointer;
            z-index: 1000;
        }

        #chatbot-icon img {
            width: 100%;
            height: auto;
            border-radius: 50%;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }

        /* Hộp chatbot */
        #chatbot-box {
            position: fixed;
            bottom: 100px;
            right: 20px;
            width: 400px;
            height: 500px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            display: none;
            z-index: 1000;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .chatbot-header {
            background: #007bff;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .chatbot-header button {
            background: none;
            border: none;
            color: white;
            font-size: 18px;
            cursor: pointer;
            margin-left: 10px;
        }

        .chatbot-header button:hover {
            opacity: 0.8;
        }

        /* Phần tin nhắn */
        .chatbot-body {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }

        .chatbot-messages {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .chatbot-messages p {
            padding: 12px 15px;
            border-radius: 10px;
            max-width: 75%;
            word-wrap: break-word;
        }

        .user-message {
            background: #f1f1f1;
            color: black;
            align-self: flex-end;
        }

        .bot-message {
            background: #f1f1f1;
            color: black;
            align-self: flex-start;
        }

        .bot-message a {
            color: #007bff;
            text-decoration: underline;
            cursor: pointer;
        }

        .bot-message a:hover {
            color: #0056b3;
        }

        .bot-message a.car-link {
            color: #007bff;
            text-decoration: none;
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            background: #e3f2fd;
            margin: 5px 0;
            transition: all 0.3s ease;
        }

        .bot-message a.car-link:hover {
            color: #0056b3;
            background: #bbdefb;
            text-decoration: none;
        }


        .car-item strong {
            color: #2196f3;
        }

        .bot-response {
            line-height: 1.5;
        }

        /* Footer */
        .chatbot-footer {
            display: flex;
            padding: 10px;
            border-top: 1px solid #ccc;
            background: #fff;
        }

        .chatbot-footer input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .chatbot-footer button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            margin-left: 5px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .typing-indicator {
            padding: 10px;
            background: #f1f1f1;
            border-radius: 10px;
            margin-bottom: 10px;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% {
                opacity: 0.5;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0.5;
            }
        }

        .bot-message.error {
            background: #ffebee;
            color: #c62828;
        }

        /* Smooth transitions */
        #chatbot-box {
            transition: all 0.3s ease-in-out;
        }

        .chatbot-messages div {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive styles for chatbot */
        @media (max-width: 576px) {
            #chatbot-box {
                width: 90%;
                height: 60vh;
                right: 5%;
                bottom: 80px;
            }

            #chatbot-icon {
                width: 50px;
                height: 50px;
                bottom: 15px;
                right: 15px;
            }

            .chatbot-header {
                padding: 10px;
                font-size: 16px;
            }

            .chatbot-footer input {
                font-size: 14px;
                padding: 8px;
            }

            .chatbot-footer button {
                padding: 8px 12px;
                font-size: 14px;
            }

            .chatbot-messages p {
                padding: 10px;
                max-width: 85%;
                font-size: 14px;
            }
        }

        @media (min-width: 577px) and (max-width: 768px) {
            #chatbot-box {
                width: 70%;
                right: 15%;
                height: 70vh;
            }

            #chatbot-icon {
                width: 60px;
                height: 60px;
            }
        }
    </style>


    <!-- Chatbot JavaScript -->
    <script>
        class ChatbotUI {
            constructor() {
                this.chatbotBox = document.getElementById("chatbot-box");
                this.inputField = document.getElementById("chatbot-input");
                this.messagesContainer = document.getElementById("chatbot-messages");
                this.isTyping = false;
                this.typingTimeout = null;
                this.messageQueue = [];
                this.processingQueue = false;

                // Initialize chatbot state
                this.initializeChatbot();

                // Setup event listeners
                this.setupEventListeners();
            }

            initializeChatbot() {
                if (!localStorage.getItem("chatbotOpened")) {
                    this.chatbotBox.style.display = "flex";
                    localStorage.setItem("chatbotOpened", "true");
                } else {
                    this.chatbotBox.style.display = "none";
                }

                // Restore chat history if exists
                const history = localStorage.getItem("chatHistory");
                if (history) {
                    this.messagesContainer.innerHTML = history;
                }
            }

            setupEventListeners() {
                // Input field event listener with debouncing
                this.inputField.addEventListener("keypress", this.debounce((event) => {
                    if (event.key === "Enter") {
                        this.sendMessage();
                    }
                }, 300));

                // Add scroll event listener for lazy loading
                this.messagesContainer.addEventListener("scroll", this.debounce(() => {
                    this.handleScroll();
                }, 200));
            }

            debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            toggleChatbot() {
                if (this.chatbotBox.style.display === "none" || this.chatbotBox.style.display === "") {
                    this.chatbotBox.style.display = "flex";
                    this.inputField.focus();
                    // Scroll to bottom when opening
                    this.scrollToBottom();
                } else {
                    this.chatbotBox.style.display = "none";
                }
            }

            async sendMessage() {
                const message = this.inputField.value.trim();
                if (message === "" || this.isTyping) return;

                try {
                    // Add user message
                    this.addMessage(message, "user-message");
                    this.inputField.value = "";

                    // Show typing indicator
                    this.showTypingIndicator();

                    const response = await this.sendToServer(message);

                    // Remove typing indicator and add bot response
                    this.hideTypingIndicator();
                    this.addMessage(response.reply, "bot-message");

                    // Save chat history
                    this.saveChatHistory();

                    // Scroll to bottom
                    this.scrollToBottom();

                } catch (error) {
                    console.error("Error:", error);
                    this.hideTypingIndicator();
                    this.addMessage("Xin lỗi, có lỗi xảy ra. Vui lòng thử lại sau.", "bot-message error");
                }
            }

            async sendToServer(message) {
                const response = await fetch("/chatbot/send-message", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute(
                            "content")
                    },
                    body: JSON.stringify({
                        message
                    })
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                return await response.json();
            }

            addMessage(content, className) {
                const messageElement = document.createElement("div");
                messageElement.className = className;
                messageElement.innerHTML = content;

                // Add click handlers for links
                messageElement.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', (e) => {
                        e.preventDefault();
                        window.open(link.href, '_blank');
                    });
                });

                this.messagesContainer.appendChild(messageElement);
                this.scrollToBottom();
            }

            showTypingIndicator() {
                this.isTyping = true;
                const typingIndicator = document.createElement("div");
                typingIndicator.className = "typing-indicator bot-message";
                typingIndicator.innerHTML = "Đang trả lời...";
                this.messagesContainer.appendChild(typingIndicator);
                this.scrollToBottom();
            }

            hideTypingIndicator() {
                this.isTyping = false;
                const typingIndicator = this.messagesContainer.querySelector(".typing-indicator");
                if (typingIndicator) {
                    typingIndicator.remove();
                }
            }

            scrollToBottom() {
                this.messagesContainer.scrollTop = this.messagesContainer.scrollHeight;
            }

            saveChatHistory() {
                localStorage.setItem("chatHistory", this.messagesContainer.innerHTML);
            }

            handleScroll() {
                // Implement lazy loading or infinite scroll if needed
                if (this.messagesContainer.scrollTop === 0) {
                    // Load more messages
                }
            }

            clearHistory() {
                // Clear messages container
                this.messagesContainer.innerHTML = '<p class="bot-message">Xin chào! Tôi có thể giúp gì cho bạn?</p>';

                // Clear local storage
                localStorage.removeItem("chatHistory");

                // Save the new empty state
                this.saveChatHistory();

                // Scroll to bottom
                this.scrollToBottom();
            }
        }

        // Initialize chatbot
        const chatbot = new ChatbotUI();

        // Global function for the onclick handler
        function toggleChatbot() {
            chatbot.toggleChatbot();
        }

        function sendMessage() {
            chatbot.sendMessage();
        }

        function handleKeyPress(event) {
            if (event.key === "Enter") {
                chatbot.sendMessage();
            }
        }
    </script>

<script defer src="https://chatbot.techzone.edu.vn/vendor/chatbot/js/external-chatbot.js" data-chatbot-uuid="08a58836-a38c-49cd-b2e8-9019629c7988" data-iframe-width="420" data-iframe-height="745" data-language="en" ></script>
    <!-- js -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter-up.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/js/flex-slider.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

    @stack('scripts')
</body>

</html>
