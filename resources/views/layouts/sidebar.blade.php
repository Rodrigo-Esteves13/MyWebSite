<?php
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
    $isLoginPage = Route::currentRouteName() === 'login';
    $isRegisterPage = Route::currentRouteName() === 'register';
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/sidebar.blade.css') }}">
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <title>REMS</title>
    </head>
<body>
<div class="sidebar" id="sidebar">
    <div class="profile-picture">
        <img src="{{ Auth::user()->profile_picture }}" alt="Profile Picture">
    </div>
    <ul>
        <li><a href="{{ url('/projects') }}">My Projects <i class="fas fa-project-diagram"></i></a></li>
        <li><a href="#">About Me</a></li>
        <li><a href="{{ url('/chat') }}">Chat with me</a></li>
        @guest
            <!-- User is not logged in -->
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
            <li class="dropdown">
                <a class="dropdown-toggle">
                    {{ Auth::user()->username }}
                </a>
                <ul>
                    <li><a href="{{ route('profile.show', ['username' => Auth::user()->username]) }}">Show Profile</a></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </li>
                </ul>
            </li>
        @endauth
    </ul>
</div>

<div class="content">
    <!-- Your content here -->
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    document.addEventListener('DOMContentLoaded', () => {
        sidebar.addEventListener('mouseenter', () => {
            sidebar.classList.add('active');
        });
        sidebar.addEventListener('mouseleave', () => {
            sidebar.classList.remove('active');
        });
    });
</script>
</body>
</html>
