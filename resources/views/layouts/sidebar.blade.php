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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>REMS</title>
    <style>
        /*style to prevent blue underling hrefs, if i put on css in does not work*/
        a {
            text-decoration: none; /* Remove underline */
            color: inherit; /* Use the parent color */
            cursor: pointer; /* Set cursor to pointer on hover */
        }
        a:hover {
            text-decoration: none; /* Remove underline on hover */
            color: inherit; /* Use the parent color on hover */
        }
    </style>
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
            <div class="username dropdown" id="profile-dropdown">
                <a class="dropdown-toggle" style="text-decoration: none;">
                    <span class="default-text">User</span>
                    <span class="username-text">{{ Auth::user()->username }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="light-mode dark-mode"> <!-- Add both light-mode and dark-mode classes -->
                        <a href="{{ route('profile.show', ['username' => Auth::user()->username]) }}">Show Profile <i class="fas fa-user"></i></a>
                    </li>
                    <li class="light-mode dark-mode"> <!-- Add both light-mode and dark-mode classes -->
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
                            <span class="sidebar-text">Our Projects</span>
                        </div>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('/about') }}">
                        <div class="sidebar-item-content">
                            <i class="fas fa-user"></i>
                            <span class="sidebar-text">About Us</span>
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
