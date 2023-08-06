<!-- Additional Laravel-specific code -->
<?php
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
    $isLoginPage = Route::currentRouteName() === 'login';
    $isRegisterPage = Route::currentRouteName() === 'register';
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMS</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/header.blade.css') }}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @include('layouts.popup')
    <link rel="stylesheet" href="{{ asset('css/popup.blade.css') }}">
</head>
<body>
<div class="header">
    <div class="left-section">
        <a href="{{ route('welcome') }}" class="logo">
        <div class="logo-text" style="color: white; text-decoration: none;">REMS</div>
        </a>
    </div>
    <div class="buy-coffee">
            <span id="buyCoffeeBtn">Buy me a coffee</span>
            <i class="fas fa-coffee"></i>
        </div>
    <nav class="header__nav">

    </nav>
</div>
<script src="{{ asset('js/popup.js') }}"></script>
<script src="{{ asset('js/paypal.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    const sidebar = document.querySelector('.sidebar');
    const header = document.querySelector('.header');

    sidebar.addEventListener('mouseenter', () => {
        header.style.width = 'calc(100% - 150px)'; // Adjust the width to match the expanded sidebar width
    });

    sidebar.addEventListener('mouseleave', () => {
        header.style.width = '100%';
    });
</script>
</body>
</html>
