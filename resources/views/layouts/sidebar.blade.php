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
    <div class="profile-info" id="profile-info">
        @guest
        <ul>
            <li class="sidebar-item">
                <a href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt"></i>
                    <span class="sidebar-text">Login</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('register') }}">
                    <i class="fas fa-user-plus"></i>
                    <span class="sidebar-text">Register</span>
                </a>
            </li>
        </ul>
        @else
        <div class="profile-picture">
            <img src="{{ asset('public/storage/profilePic/' . Auth::user()->profile_picture) }}" alt="Profile Picture">
        </div>
        <div class="username dropdown" id="profile-dropdown">
            <a class="dropdown-toggle" style="text-decoration: none; color: white;">
                {{ Auth::user()->username }}
            </a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('profile.show', ['username' => Auth::user()->username]) }}">Show Profile <i class="fas fa-user"></i></a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout  <i class="fas fa-sign-out-alt"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                </li>
            </ul>
        </div>
        @endif
    </div>
    <div class="itensSidebar">
        <ul>
            <li class="sidebar-item">
                <a href="{{ url('/projects') }}">
                    <i class="fas fa-project-diagram"></i>
                    <span class="sidebar-text">My Projects</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ url('/about') }}">
                    <i class="fas fa-user"></i>
                    <span class="sidebar-text">About Me</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ url('/chat') }}">
                    <i class="fas fa-comments"></i>
                    <span class="sidebar-text">Chat with me</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ url('/announcements') }}">
                    <i class="fas fa-bullhorn"></i>
                    <span class="sidebar-text">Announcements</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<script>
    const profileDropdown = document.getElementById('profile-dropdown');
    const dropdownMenu = document.querySelector('.dropdown-menu');

    profileDropdown.addEventListener('click', (event) => {
        event.stopPropagation(); // Prevent the click from closing the dropdown
        dropdownMenu.classList.toggle('show');
    });

    // Close the dropdown menu when clicking outside
    document.addEventListener('click', (event) => {
        if (!profileDropdown.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.remove('show');
        }
    });
</script>

</body>
</html>
