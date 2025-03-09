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
    <title>@yield('title', 'Motex - Car Dealer And Automotive HTML5 Template')</title>

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
    <div id="chatbot-icon">
        <img src="{{ asset('assets/img/chatbot-icon.webp') }}" alt="Chatbot" onclick="toggleChatbot()">
    </div>

    <!-- Chatbot Box -->
    <div id="chatbot-box">
        <div class="chatbot-header">
            <span>Hỗ trợ trực tuyến</span>
            <button onclick="toggleChatbot()">✖</button>
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
            background: #007bff;
            color: white;
            align-self: flex-end;
        }

        .bot-message {
            background: #f1f1f1;
            color: black;
            align-self: flex-start;
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
    </style>


    <!-- Chatbot JavaScript -->
    <script>
        // Kiểm tra nếu đã mở chatbot trước đó hay chưa
        document.addEventListener("DOMContentLoaded", function () {
            let chatbotBox = document.getElementById("chatbot-box");

            if (!localStorage.getItem("chatbotOpened")) {
                chatbotBox.style.display = "flex"; // Mở chatbot tự động lần đầu
                localStorage.setItem("chatbotOpened", "true"); // Đánh dấu là đã mở
            } else {
                chatbotBox.style.display = "none"; // Nếu đã mở trước đó, giữ nó ẩn
            }
        });

        // Toggle chatbot hiển thị khi click vào icon
        function toggleChatbot() {
            let chatbotBox = document.getElementById("chatbot-box");

            if (chatbotBox.style.display === "none" || chatbotBox.style.display === "") {
                chatbotBox.style.display = "flex"; // Hiện hộp chatbot
                setTimeout(() => {
                    document.getElementById("chatbot-input").focus(); // Tự động focus vào ô nhập tin nhắn
                }, 300);
            } else {
                chatbotBox.style.display = "none"; // Ẩn hộp chatbot
            }
        }



        function sendMessage() {
            var inputField = document.getElementById("chatbot-input");
            var message = inputField.value.trim();
            if (message === "") return;

            var messagesContainer = document.getElementById("chatbot-messages");

            // Hiển thị tin nhắn của người dùng
            var userMessage = document.createElement("p");
            userMessage.textContent = message;
            userMessage.className = "user-message";
            messagesContainer.appendChild(userMessage);

            // Cuộn xuống cuối cùng
            messagesContainer.scrollTop = messagesContainer.scrollHeight;

            // Gửi tin nhắn đến OpenAI API (nếu cần)
            getBotResponse(message);

            // Xóa ô nhập
            inputField.value = "";
        }

        function handleKeyPress(event) {
            if (event.key === "Enter") {
                sendMessage();
            }
        }


        function getBotResponse(message) {
            var messagesContainer = document.getElementById("chatbot-messages");

            var botMessage = document.createElement("p");
            botMessage.textContent = "Đang xử lý...";
            botMessage.className = "bot-message";
            messagesContainer.appendChild(botMessage);
            messagesContainer.scrollTop = messagesContainer.scrollHeight;

            fetch("/chatbot/send-message", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify({ message: message })
            })
                .then(response => response.json())
                .then(data => {
                    botMessage.textContent = data.reply;
                })
                .catch(error => {
                    botMessage.textContent = "Xin lỗi, tôi không thể trả lời ngay bây giờ.";
                    console.error("Lỗi:", error);
                });
        }

    </script>


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