<?php
    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Auth;

    $user = Auth::user();
?>

@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/profile.blade.css') }}">

<div class="profile-container">
  <div class="profile-table">
    <h1>User Profile</h1>
    <table>
      <tr>
        <th>Profile Picture</th>
        <td><img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture"></td>
      </tr>
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

    <div class="text-center"> <!-- This div centers its content -->
      @if(Auth::user() && Auth::user()->id === $user->id)
        <a href="{{ route('profile.edit', ['username' => $user->username]) }}" class="btn btn-primary">Edit Profile</a>
      @endif
    </div>

  </div>
</div>
@include('layouts.footer')
