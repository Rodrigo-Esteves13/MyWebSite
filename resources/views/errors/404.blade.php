<link rel="stylesheet" href="{{ asset('css/404.blade.css') }}">
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="error-container">
            <h1 class="error-heading">404</h1>
            <p class="error-message">Why are you here? Are you lost? If that's the case, here's a teleportation to home!</p>
            <img src="{{ asset('img/finger-down.png') }}" alt="Finger Pointing Down">
            <div class="mt-6">
                <a href="{{ route('welcome') }}" class="error-link">Go back to home</a>
            </div>
        </div>
    </div>