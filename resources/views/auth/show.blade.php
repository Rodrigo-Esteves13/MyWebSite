<?php
    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
?>

@include('layouts.header')

<div class="loginRegister-container">
    <h1>User Profile</h1>
    <link rel="stylesheet" href="{{ asset('css/loginRegister.body.blade.css') }}">

    <div>
        <h2>{{ $user->name }}</h2>
        <p>{{ $user->email }}</p>
        <!-- Display other profile data as needed -->
    </div>
</div>

@include('layouts.footer')
