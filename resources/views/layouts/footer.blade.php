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
    <footer>
        <div class="logo-section">
            <div class="logos">
                <a style="color: white; text-decoration: none;" href="#" id="instagram-link">
                    <i class="fab fa-instagram"></i>
                    <span class="app-name">Instagram</span>
                </a>
            </div>
            <div class="logos linkedin">
                <a style="color: white; text-decoration: none;" href="#" id="linkedin-link">
                    <i class="fab fa-linkedin"></i>
                    <span class="app-name linkedin">LinkedIn</span>
                </a>
            </div>
        </div>
        <div class="black-section">
            <p>&copy; 2023 REMS. All rights reserved.</p>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="{{ asset('js/theme.js') }}"></script>

    <script>
        // JavaScript to open all Instagram links simultaneously when the Instagram logo is clicked
        document.getElementById('instagram-link').addEventListener('click', function() {
            window.open("https://www.instagram.com/esteves_rodrigo99/", '_blank');
            window.open("https://www.instagram.com/sirgato10/", '_blank');
            window.open("https://www.instagram.com/_.mendes._78/", '_blank');
        });

        // JavaScript to open all LinkedIn links simultaneously when the LinkedIn logo is clicked
        document.getElementById('linkedin-link').addEventListener('click', function() {
            window.open("https://www.linkedin.com/in/rodrigo-esteves99/", '_blank');
            // Add more LinkedIn profile links here if needed
        });
    </script>
</body>
</html>
