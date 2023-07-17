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
    <tr>
        <td colspan="2">
            <form action="{{ route('profile.destroy', $user) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account?')">Delete Account</button>
            </form>
        </td>
    </tr>
    </table>
  </div>
</div>


@include('layouts.footer')
