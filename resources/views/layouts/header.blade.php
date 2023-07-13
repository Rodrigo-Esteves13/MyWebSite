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
    <title>R.ME</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/header.blade.css') }}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('css/popup.blade.css') }}">
</head>
<body>
<div class="header">
    <a href="{{ route('welcome') }}" class="logo">
        <div class="logo-text" style="color: white; text-decoration: none;">R.ME</div>
        <div class="separator"></div>
        <img src="/svg/FireLogo.svg" alt="Logo">
    </a>
    <div class="buy-coffee">
        <span id="buyCoffeeBtn">Buy me a coffee</span>
        <i class="fas fa-coffee"></i>
    </div>
    <nav class="header__nav">
        @guest
            <!-- User is not logged in -->
            <a href="{{ route('login') }}">Login</a>
            <span class="separator"></span>
            <a href="{{ route('register') }}">Register</a>
            <span class="separator"></span>
        @else
            <!-- User is logged in -->
            <div class="dropdown">
                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }}
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                        Edit Profile
                    </a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <span class="separator"></span>
        @endguest
        <a href="{{ url('/projects') }}">My Projects</a>
        <span class="separator"></span>
        <a href="{{ url('/chat') }}">Chat with me</a>
    </nav>
</div>

    <!-- JavaScript code -->
    <script src="{{ asset('js/popup.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').on('click', function() {
                $(this).siblings('.dropdown-menu').toggleClass('show');
            });
        });
    </script>
</body>
</html>
