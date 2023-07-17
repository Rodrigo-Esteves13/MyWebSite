<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $this->authorize('view', $user);
    
        // Check if the user exists
        if (!$user) {
            abort(404); // Or handle the case when the user is not found
        }
    
        // Fetch the user's profile data
        $profileData = $user->profile;
    
        // Pass the profile data to the view
        return view('auth.show', compact('profileData'));
    }
    public function destroy(User $user)
    {
        $this->authorize('delete', $user);

        // Perform any additional necessary actions (e.g., delete related records, log out the user)

        $user->delete();

        return redirect()->route('welcome')->with('success', 'Your account has been deleted.');
    }


    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }
}
