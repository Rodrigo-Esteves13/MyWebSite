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
                <li class="auth-links">
                    <a href="{{ route('login') }}">
                        <div class="sidebar-item-content">
                            <i class="fas fa-sign-in-alt"></i>
                            <span class="sidebar-text">Login</span>
                        </div>
                    </a>
                </li>
                <li class="auth-links">
                    <a href="{{ route('register') }}">
                        <div class="sidebar-item-content">
                            <i class="fas fa-user-plus"></i>
                            <span class="sidebar-text">Register</span>
                        </div>
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
            @endguest
        </div>
        <div class="itensSidebar">
            <ul>
                <li class="sidebar-item">
                    <a href="{{ url('/projects') }}">
                        <div class="sidebar-item-content">
                            <i class="fas fa-project-diagram"></i>
                            <span class="sidebar-text">My Projects</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('/about') }}">
                        <div class="sidebar-item-content">
                            <i class="fas fa-user"></i>
                            <span class="sidebar-text">About Me</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('/chat') }}">
                        <div class="sidebar-item-content">
                            <i class="fas fa-comments"></i>
                            <span class="sidebar-text">Chat with me</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('/news') }}">
                        <div class="sidebar-item-content">
                            <i class="fas fa-bullhorn"></i>
                            <span class="sidebar-text">News</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <script src="{{ asset('js/theme.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const profileDropdown = document.getElementById('profile-dropdown');
            const dropdownMenu = document.querySelector('.dropdown-menu');

            if (profileDropdown) {
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
            }
        });
    </script>
</body>
</html>
