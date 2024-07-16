<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | QuizKeeper</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <style>
        .typing-animation {
            animation: typing 1s steps(10, end);
            overflow: hidden;
            white-space: nowrap;
        }

        @keyframes typing {
            from {
                width: 0;
            }
        }
        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.9rem;
        }

    </style>
</head>

<body>
    <header style="border-bottom: 1px solid #d3d3d3; padding-bottom: 20px;">
        <div class="container" style="position: relative;">
            <img src="{{ asset('images/ribbon.png') }}" alt="Banner"
                style="position: absolute; top: 0; left: 10px; width: 30px; height: 116px;">
            <img src="{{ asset('images/binus.png') }}" alt="Logo"
                style="width: 144px; height: 92px; display: inline-block; margin-left: 50px; margin-top: 15px;">
            <div class="pull-right text-right" id="welcome-messages"
                style="position: absolute; right: 15px; bottom: 0;">
                <div style="text-align: right;">
                    <b>
                        <span class="cursor ng-isolate-scope" id="greeting"
                            style="color: #777; padding-right: 3px; position: relative;">Aloha</span>
                        <span class="blue ng-binding" style="color: #0090d1;">{{Auth::user()->username}}</span>
                    </b>
                </div>
                <div class="time ng-binding" id="current-time" style="color: #777;"></div>
                <button type="button" class="btn btn-light btn-sm" style="float: right;"
                    onclick="window.location.href='{{route('logout')}}'"><i class="bi bi-box-arrow-left"></i> Sign
                    out</button>
            </div>
        </div>
    </header>

    <script>
        function updateTime() {
            let currentTime = new Date();

            let formattedTime = currentTime.toLocaleString('en-US', {
                weekday: 'short',
                month: 'short',
                day: '2-digit',
                year: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            });

            document.getElementById('current-time').textContent = formattedTime;
        }

        setInterval(updateTime, 1000);

        const greetings = ["Aloha", "Bonjour", "你好", "Halo", "안녕하세요", "Hello", "Hola", "Ciao", "مرحبا", "नमस्ते"];

        let greetingIndex = 0;

        function changeGreeting() {
            let greetingElement = document.getElementById('greeting');

            let currentGreeting = greetings[greetingIndex];

            greetingElement.textContent = "";

            for (let i = 0; i < currentGreeting.length; i++) {
                setTimeout(function () {
                    greetingElement.textContent += currentGreeting.charAt(i);
                }, i * 250);
            }

            greetingIndex = (greetingIndex + 1) % greetings.length;
        }

        setInterval(changeGreeting, 5000);

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="container mt-3 mb-3">
        @yield('content')
    </div>

</body>

</html>
