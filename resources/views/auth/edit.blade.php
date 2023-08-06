@include('layouts.header')
<link rel="stylesheet" href="{{ asset('css/profile.blade.css') }}">

<div class="profile-container">
  <div class="profile-table">
    <h1>User Profile</h1>
    <table>
      @if($isEditable)
      <tr>
        <td colspan="2">
          <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="profile_picture">Profile Picture</label>
                <input id="profile_picture" type="file" class="form-control @error('profile_picture') is-invalid @enderror" name="profile_picture" accept="image/*">
                @error('profile_picture')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div><br>
            <label for="name">Name:</label><br>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required><br>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}" required><br>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required><br>

            <!-- Remove the inner form tag from here -->

            <button type="submit">Update Profile</button>
          </form>
        </td>
      </tr>
      @else
      <tr>
        <td colspan="2">
          <p>Your profile is not editable.</p>
        </td>
      </tr>
      @endif
    </table>

    <form action="{{ route('profile.destroy', $user->username) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?')">
      @csrf
      @method('DELETE')
      <button type="submit" class="btn btn-danger">Delete Account</button>
    </form>
  </div>
</div>

@include('layouts.footer')
