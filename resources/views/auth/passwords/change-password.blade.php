@include('layouts.header')
@include('layouts.sidebar')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REMS</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/change-password.blade.css') }}">
</head>


<div class="change-password-container">
  <div class="change-password-table">
    <h1>Change Password</h1>

    @if(session('error'))
      <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('profile.update-password', ['username' => auth()->user()->username]) }}">
      @csrf

      <div class="form-group">
        <label for="current_password">Current Password</label>
        <input type="password" name="current_password" id="current_password" required>
      </div>

      <div class="form-group">
        <label for="new_password">New Password</label>
        <input type="password" name="new_password" id="new_password" required>
      </div>

      <div class="form-group">
        <label for="new_password_confirmation">Confirm New Password</label>
        <input type="password" name="new_password_confirmation" id="new_password_confirmation" required>
      </div>

      <button type="submit" class="update-button">Change Password</button>
    </form>
  </div>
</div>

@include('layouts.footer')
