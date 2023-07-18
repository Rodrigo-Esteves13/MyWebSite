<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show($username)
    {
        // Find the user profile using the username
        $user = User::where('username', $username)->first();
    
        // Check if the user profile exists
        if ($user) {
            // Check if the authenticated user is authorized to view the profile
            if (Auth::id() === $user->id) {
                return view('auth.show', ['user' => $user]);
            } else {
                // User is not authorized to view this profile
                abort(403);
            }
        } else {
            // User profile not found, handle the case accordingly
            abort(404);
        }
    }
    
    
    
    public function destroy($username)
    {
        $user = User::where('username', $username)->first();
    
        if ($user) {
            // Perform any additional necessary actions (e.g., delete related records, log out the user)
    
            $user->delete();
    
            return redirect()->route('welcome')->with('success', 'Your account has been deleted.');
        } else {
            return redirect()->route('welcome')->with('error', 'User not found.');
        }
    }
        
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }
}
