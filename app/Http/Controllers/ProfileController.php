<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash; // Import the Hash facade

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

    public function update(Request $request)
    {
        $user = Auth::user();
        
        // Validate the request data, including unique email and username
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
    
        // Find the user record using the primary key (id)
        $userToUpdate = User::find($user->id);
    
        // Update the user's attributes
        $userToUpdate->name = $request->input('name');
        $userToUpdate->username = $request->input('username');
        $userToUpdate->email = $request->input('email');
    
        // Save the changes
        $userToUpdate->save();
    
        // Update the Auth user instance with the new username, and email
        $user->name = $userToUpdate->name;
        $user->username = $userToUpdate->username;
        $user->email = $userToUpdate->email;
    
        return redirect()->route('profile.show', ['username' => $user->username])->with('success', 'Profile updated successfully.');
    }
    
    public function edit()
    {
        $user = Auth::user();
    
        // Check if the authenticated user is an admin or if the profile is editable
        $isEditable = $user->is_admin || $user->is_editable;
    
        return view('auth.edit', compact('user', 'isEditable'));
    }

    public function showChangePasswordForm($username)
    {
        // Retrieve the user by their username
        $user = User::where('username', $username)->first();
    
        // Check if the user exists and the authenticated user is authorized
        if ($user && Auth::id() === $user->id) {
            return view('auth.passwords.change-password', ['user' => $user]);
        }
    
        // Handle unauthorized access or user not found
        abort(403); // You can customize this error response as needed.
    }
    

public function changePassword(Request $request)
{
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|confirmed',
    ]);

    $user = Auth::user();

    // Check if the current password matches the user's actual password
    if (Hash::check($request->input('current_password'), $user->password)) {
        // Update the password using the update method
        User::find($user->id)->update([
            'password' => Hash::make($request->input('new_password')),
        ]);

        return redirect()->route('profile.show', ['username' => $user->username])->with('success', 'Password changed successfully.');
    } else {
        return back()->with('error', 'Current password is incorrect.');
    }
}

}
