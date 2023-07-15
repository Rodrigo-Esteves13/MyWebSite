<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMS</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/footer.blade.css') }}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
</head>
<body>
    <!-- Your page content here -->

    <footer>
        <div class="logo-section">
            <div class="logos">
                <a style="color: white; text-decoration: none;" href="https://www.instagram.com/esteves_rodrigo99/" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-instagram"></i>
                </a>
                <a style="color: white; text-decoration: none;" href="https://www.instagram.com/esteves_rodrigo99/" target="_blank" rel="noopener noreferrer">
                    <span class="app-name">Instagram</span>
                </a>
            </div>
            <div class="logos">
                <a style="color: white; text-decoration: none;" href="https://www.linkedin.com/in/rodrigo-esteves99/" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a style="color: white; text-decoration: none;" href="https://www.linkedin.com/in/rodrigo-esteves99/" target="_blank" rel="noopener noreferrer">
                    <span class="app-name">LinkedIn</span>
                </a>
            </div>
        </div>
        <div class="black-section">
            <p>&copy; 2023 REMS. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
</body>
</html>
