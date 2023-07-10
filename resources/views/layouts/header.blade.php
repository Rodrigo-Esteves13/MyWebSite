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
</head>
<body>
    <div class="header">
        <a href="{{ route('welcome') }}" class="logo">
            <div class="logo-text" style="color: white; text-decoration: none;">R.ME</div>
            <div class="separator"></div>
            <img src="/svg/FireLogo.svg" alt="Logo">
        </a>
        <nav class="header__nav">
            <?php if (!$isLoginPage && !$isRegisterPage && !Auth::check()) : ?>
                <a class="nav-link" href="<?php echo route('login'); ?>"><?php echo __('Login'); ?></a>
                <span class="separator"></span>
                <?php if (Route::has('register')) : ?>
                    <a class="nav-link" href="<?php echo route('register'); ?>"><?php echo __('Register'); ?></a>
                    <span class="separator"></span>
                <?php endif; ?>
            <?php endif; ?>
            <a href="<?php echo url('/projects'); ?>">My Projects</a>
            <span class="separator"></span>
            <a href="<?php echo url('/chat'); ?>">Chat with me</a>
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
                    <span class="separator"></span>
                <?php endif; ?>
            <?php endif; ?>
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
