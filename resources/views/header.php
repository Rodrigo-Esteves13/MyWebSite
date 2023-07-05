<!-- Additional Laravel-specific code -->
<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
?>

<!DOCTYPE html>
<html lang="en">
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R.ME</title>


    <style>
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
</style>
<body>
    <div class="header">
        <a href="{{ route('home') }}" class="logo">
            <div class="logo-text">R.ME</div>
            <div class="separator"></div>
            <img src="/svg/FireLogo.svg" alt="Logo">
        </a>
        <nav class="header__nav">
            <?php if (Route::has('login')) : ?>
                <?php if (Auth::check()) : ?>
                    <div class="dropdown">
                        <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo Auth::user()->name; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo route('profile.edit'); ?>">
                                <?php echo __('Edit Profile'); ?>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo route('logout'); ?>"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <?php echo __('Logout'); ?>
                            </a>
                            <form id="logout-form" action="<?php echo route('logout'); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </div>
                <?php else : ?>
                    <ul class="navbar-nav ms-auto">
                        <?php if (Route::has('login')) : ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo route('login'); ?>"><?php echo __('Login'); ?></a>
                            </li>
                        <?php endif; ?>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>


</div>




</div>




</html>

