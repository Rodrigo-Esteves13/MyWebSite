<!-- Additional Laravel-specific code -->
<?php
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R.ME</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- CSS styles -->
    <style>
    /* CSS styles here */
    body {
        margin: 0;
        padding: 0;
        background-color: #f1f1f1;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #333;
        color: white;
        height: 60px;
        padding: 0 20px;
    }

    .logo {
        font-size: 24px;
        font-weight: bold;
        margin-right: 10px;
        display: flex;
        align-items: center;
    }

    .logo img {
        width: 24px;
        height: 24px;
        margin-right: 5px;
    }

    .separator {
        width: 1px;
        height: 24px;
        background-color: white;
        margin: 0 10px;
    }

    .header__nav {
        display: flex;
        align-items: center;
    }

    .header__nav a {
        margin-right: 10px;
        color: white;
        text-decoration: none;
    }

    .dropdown {
        position: relative;
    }

    .dropdown-toggle {
        cursor: pointer;
    }

    .dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        z-index: 100;
        display: none;
        padding: 10px;
        background-color: #fff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        min-width: 150px;
    }

    .dropdown.open .dropdown-menu {
        display: block;
    }

    .dropdown-menu li {
        list-style: none;
    }

    .dropdown-menu a {
        display: block;
        padding: 5px 10px;
        color: #333;
        text-decoration: none;
    }

    .dropdown-menu a:hover {
        background-color: #f1f1f1;
    }
    </style>
</head>
<body>
    <div class="header">
        <a href="{{ route('welcome') }}" class="logo">
            <div class="logo-text">R.ME</div>
            <div class="separator"></div>
            <img src="/svg/FireLogo.svg" alt="Logo">
        </a>
        <nav class="header__nav">
            <?php if (Route::has('login')) : ?>
                <?php if (Auth::check()) : ?>
                    <div class="dropdown">
                        <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo Auth::user()->name; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo route('profile.edit'); ?>">
                                Edit Profile
                            </a>
                            <a class="dropdown-item" href="<?php echo route('logout'); ?>"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="<?php echo route('logout'); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </div>
                <?php else : ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo route('login'); ?>"><?php echo __('Login'); ?></a>
                        </li>
                        <?php if (Route::has('register')) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo route('register'); ?>"><?php echo __('Register'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
            <?php endif; ?>
            <a href="<?php echo url('/projects'); ?>">My Projects</a>
            <a href="<?php echo url('/chat'); ?>">Chat with me</a>
        </nav>
    </div>

    <!-- JavaScript code -->
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
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'R.ME') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex" href="{{ url('/') }}">
                <div style="display: flex; align-items: center;">
                    <img src="/svg/FireLogo.svg" style="height: 20px; border-right: 1px solid #333; padding-right: 5px;">
                    <div style="padding-left: 5px;">R.ME</div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    {{ __('Edit Profile') }}
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <!-- Add more dropdown items as needed -->

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url('/projects'); ?>">My Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo url('/chat'); ?>">Chat with me</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
