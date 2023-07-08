<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R.ME</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #002D62;
        }
        footer {
            padding: 20px;
        }
        .social-media {
            text-align: center;
            margin-top: 20px;
        }
        .social-media ul {
            padding: 0;
            margin: 0;
        }
        .social-media ul li {
            display: inline-block;
            margin-right: 20px;
        }
        .social-media ul li a {
            color: white;
            font-size: 40px;
        }
    </style>
</head>
<body>
</body>
    <!-- Your page content here -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <footer>
        <div class="social-media">
            <ul>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
            </ul>
        </div>
    </footer>
</html>
