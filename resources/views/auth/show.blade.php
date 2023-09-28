<?php
    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
?>

@include('layouts.header')
@include('layouts.sidebar')
<link rel="stylesheet" href="{{ asset('css/profile.blade.css') }}">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
<div class="profile-container">
  <div class="profile-table">
    <h1>User Profile</h1>
    <table>
      <tr>
        <th>Name</th>
        <td>{{ $user->name }}</td>
      </tr>
      <tr>
        <th>Username</th>
        <td>{{ $user->username }}</td>
      </tr>
      <tr>
        <th>E-mail</th>
        <td>{{ $user->email }}</td>
      </tr>
    </table><br>

    <div class="text-center">
      @if(Auth::user() && Auth::user()->id === $user->id)
        <a href="{{ route('profile.edit', ['username' => $user->username]) }}" class="btn btn-primary">Edit Profile</a>
      @endif
    </div>
  </div>
</div>

@include('layouts.footer')
