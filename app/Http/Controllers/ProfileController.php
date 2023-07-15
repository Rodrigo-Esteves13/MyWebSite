<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($user)
    {
        $user = User::where('identifier', $user)->first();
    
        // Check if the user exists
        if (!$user) {
            abort(404); // Or handle the case when the user is not found
        }
    
        // Fetch the user's profile data
        $profileData = $user->profile;
    
        // Pass the profile data to the view
        return view('auth.show', compact('profileData'));
    }
  
    
    
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }
}
