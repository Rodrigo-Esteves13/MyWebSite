<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REMS</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/header.blade.css') }}">
    <link rel="stylesheet" href="{{ asset('scss/theme.scss') }}">
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
        <div class="logo-text">REMS</div>
        </a>
    </div>
    <div class="buy-coffee">
            <span id="buyCoffeeBtn" class="buyCoffee">Buy me a coffee</span>
            <i class="fas fa-coffee"></i>
        </div>
<nav class="header__nav">
<div class="toggle-mode">
    <input type="checkbox" id="modeSwitch" class="toggle-checkbox">
    <label for="modeSwitch" class="toggle-label">
        <div class="icons">
        <i class="fas fa-sun sun-icon"></i>
            <div class="toggle-button"></div>
        <i class="fas fa-moon moon-icon"></i>
        </div>
    </label>
    </nav>
</div>

<script src="{{ asset('js/popup.js') }}"></script>
<script src="{{ asset('js/paypal.js') }}"></script>
<script src="{{ asset('js/theme.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
