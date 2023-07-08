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
        background: linear-gradient(to right, #505050, #B0B0B0);
        border-radius: 8px;
        color: white;
        height: 60px;
        padding: 0 20px;
        margin-top: 10px;
        margin-right: 15px;
        margin-left: 15px;
        border-color: black 2px;
        /* animation: borderAnimation 5s infinite linear; */
    }
    /* @keyframes borderAnimation {
        0% {
            border: 2px solid red;
        }
        25% {
            border: 2px solid blue;
        }
        50% {
            border: 2px solid red;
        }
        75% {
            border: 2px solid blue;
        }
        100% {
            border: 2px solid red;
        }
    } */

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
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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