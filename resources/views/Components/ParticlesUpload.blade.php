<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* General body styling */
        body {
            background: radial-gradient(circle, #00d2ff, #3a7bd5);
            margin: 0;
            padding: 0;
            overflow: hidden;
            font-family: Arial, sans-serif;
        }

        /* Static background replacement for particles */
        .static-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            background: linear-gradient(45deg, #00d2ff, #3a7bd5);
            opacity: 0.8;
        }

        /* Container for content */
        .container {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Typography and spacing */
        h1, h2, h3, h4, h5, h6 {
            color: #333;
        }

        p {
            font-size: 16px;
            color: #555;
        }

        /* Media Queries for responsiveness */
        @media (max-width: 768px) {
            .container {
                padding: 20px 10px;
            }
        }
    </style>
    <title>@yield('title')</title>
</head>

<body>
    <!-- Static background -->
    <div class="static-background"></div>

    <!-- Main content -->
    <div class="container">
        @yield('content')
    </div>
</body>

</html>
