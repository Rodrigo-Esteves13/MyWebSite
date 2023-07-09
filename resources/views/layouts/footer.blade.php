<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R.ME</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/footer.blade.css') }}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
</head>
    <!-- Your page content here -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>


     <footer>
        <div class="logo-section">
            <div class="logos">
                <i class="fab fa-instagram"></i>
                <span class="app-name">Instagram</span>
            </div>
            <div class="logos">
                <i class="fab fa-linkedin"></i>
                <span class="app-name">LinkedIn</span>
            </div>
        </div>
        <div class="black-section">
            <p>&copy; 2023 R.ME. All rights reserved.</p>
        </div>
    </footer>
</html>
