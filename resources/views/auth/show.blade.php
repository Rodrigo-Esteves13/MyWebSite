<?php
    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
?>
@include('layouts.header')
@include('layouts.sidebar')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REMS - Profile</title>
    <link rel="stylesheet" href="{{ asset('css/profile.blade.css') }}">
</head>
<body>
<div class="profile-container">
<div class="profile-table ">
  <div class="form-group-border">
    <h1>User Profile</h1>
    </div>
    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.update-password', ['username' => auth()->user()->username]) }}">
      @csrf

      <div class="form-group form-group-border">
          <label for="current_password">Name</label>
          <label>{{ $user->name }}</label>
      </div>

      <div class="form-group form-group-border">
          <label for="new_password">Username</label>
          <label>{{ $user->username }}</label>
      </div>

      <div class="form-group form-group-border">
          <label for="new_password_confirmation">E-mail</label>
          <label>{{ $user->email }}</label>
      </div>

    <div class="text-center">
      @if(Auth::user() && Auth::user()->id === $user->id)
        <a href="{{ route('profile.edit', ['username' => $user->username]) }}" class="btn btn-primary">Edit Profile</a>
      @endif
    </div>
  </div>
</div>
</body>
@include('layouts.footer')


      <button type="submit" class="update-button">Change Password</button>
    </form>
  </div>
</div>