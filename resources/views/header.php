<!-- Additional Laravel-specific code -->
<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
?>

<!DOCTYPE html>
<html lang="en">

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

<div class="header">
    <a href="<?php echo route('home'); ?>" class="logo">
        <div class="logo-text">R.ME</div>
        <div class="separator"></div>
        <img src="/svg/FireLogo.svg" alt="Logo">
    </a>
    <nav class="header__nav">
    <?php if (Route::has('login')) : ?>
        <?php if (Auth::check()) : ?>
            <a href="<?php echo route('home'); ?>">Dashboard</a>
        <?php else : ?>
            <a href="<?php echo route('login'); ?>">Log in</a>
            <?php if (Route::has('register')) : ?>
                <a href="<?php echo route('register'); ?>">Register</a>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
    <a href="<?php echo url('/projects'); ?>">My Projects</a>
    <a href="<?php echo url('/chat'); ?>">Chat with me</a>
    </nav>

</div>




</html>

