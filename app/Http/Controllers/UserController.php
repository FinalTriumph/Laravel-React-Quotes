<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Update user profile data
     *
     * TODO Potentially can add more profile data
     * and then make 'changeEmail' also as separate action.
     * 
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $fields = $request->validate([
            'name' => 'required|min:5|max:20',
            'email' => 'required|max:255|email|unique:users,email,' . $user->id,
        ]);

        $user->update($fields);

        return redirect()->route('user.profile');
    }

    /**
     * Update user password
     */
    public function changePassword(Request $request)
    {
        $fields = $request->validate([
            'old_password' => 'required|min:5',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = Auth::user();

        if (!Auth::attempt(['email' => $user->email, 'password' => $fields['old_password']])) {
            throw ValidationException::withMessages([
                'old_password' => 'The provided password does not match our records.'
            ]);
        }

        $user->update(['password' => $fields['password']]);

        return redirect()->route('user.profile');
    }

    /**
     * Delete user profile
     */
    public function deleteProfile(Request $request)
    {
        $fields = $request->validate([
            'password' => 'required',
        ]);

        $user = Auth::user();

        // Validate password
        if (!Auth::attempt(['email' => $user->email, 'password' => $fields['password']])) {
            throw ValidationException::withMessages([
                'password' => 'The provided password does not match our records.'
            ]);
        }

        // Logout user
        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        // Delete user profile
        $user->delete();

        // Redirect
        return redirect()->route('home');
    }

    /**
     * 
     */
    public function userQuotesPage(User $user)
    {
        return view('quotes.user', compact('user'));
    }
}
