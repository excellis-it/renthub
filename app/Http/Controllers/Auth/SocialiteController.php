<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\RegisteredNewVendor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Laravel\Socialite\Facades\Socialite;
use PHPUnit\Exception;
use App\Http\Controllers\Auth\RegisteredUserController;

class SocialiteController extends Controller
{
    /**
     * Redirecting to google
     */
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    /**
     * Logic function for Google callback
     */
    public function googleCallback()
{
    try {
        $user = Socialite::driver('google')->user();

        // Check if the user already exists based on social_id or email
        $oldUser = User::where('social_id', $user->id)
            ->orWhere('email', $user->email)
            ->first();

        if ($oldUser) {
            // User exists, log them in
            Auth::login($oldUser);

            // Update user data (if needed)
            $oldUser->update([
                'role' => $user->role ? 'vendor' : 'user',
                'social_type' => 'google',
                'social_id' => $user->id,
            ]);

            // Redirect based on their role
            return redirect($oldUser->role . '/profile')
                ->with('success', 'Welcome, ' . $oldUser->first_name . ' ' . $oldUser->last_name . '!');
        } else {
            // Create new user
            $newUser = User::create([
                'first_name' => $user->user['given_name'] ?? explode(' ', $user->name)[0],
                'last_name' => $user->user['family_name'] ?? explode(' ', $user->name)[1] ?? null,
                'username' => $user->name ?? null,
                'email' => $user->email,
                'social_id' => $user->id,
                'photo' => $user->avatar,
                'role' => 'user',
                'social_type' => 'google',
                'password' => bcrypt('12345678'),
                'status' => 1,
                'is_delete' => 1,
            ]);

            // Log the new user in
            Auth::login($newUser);

            // Redirect to the user profile
            return redirect('user/profile')->with('success', 'Welcome, ' . $newUser->first_name . ' ' . $newUser->last_name . '!');
        }
    } catch (\Exception $e) {
        // Handle errors gracefully and show an error message
        return redirect()->route('login')->with('error', 'Something went wrong. Please try again.');
    }
}

    
    public function facebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            // Check if the user already exists based on social_id or email
            $oldUser = User::where('social_id', $user->id)
                ->orWhere('email', $user->email)
                ->first();

            if ($oldUser->role ? 'vendor' : 'user') {
                // User exists, log them in
                Auth::login($oldUser);

                // Update user data (if needed)
                $oldUser->update([
                    // This might not be necessary since you're using Google login
                    // 'role' => $user->role ? 'vendor' : 'user',
                    'social_type' => 'facebook',
                    'social_id' => $user->id,
                ]);
                // dd($oldUser->role);

                // Redirect based on their role
                return redirect($oldUser->role . '/profile')->with('success', 'Welcome, ' . $oldUser->first_name. ' '. $oldUser->last_name . '!');
            } else {
                // If the user doesn't exist, handle the case accordingly
                return redirect()->route('login')->with('error', 'No user found with this social account.');
            }
        } catch (\Exception $e) {
            // Handle errors gracefully
            return redirect()->route('login')->with('error', 'Something went wrong! Please try again.');
        }
    }

    public function redirectToYoutube(){
        return Socialite::driver('youtube')->redirect();
    }

    public function youtubeCallback()
    {
        try {
            $user = Socialite::driver('youtube')->user();

            // Check if the user already exists based on social_id or email
            $oldUser = User::where('social_id', $user->id)
                ->orWhere('email', $user->email)
                ->first();

            if ($oldUser->role ? 'vendor' : 'user') {
                // User exists, log them in
                Auth::login($oldUser);

                // Update user data (if needed)
                $oldUser->update([
                    // This might not be necessary since you're using Google login
                    // 'role' => $user->role ? 'vendor' : 'user',
                    'social_type' => 'youtube',
                    'social_id' => $user->id,
                ]);
                // dd($oldUser->role);

                // Redirect based on their role
                return redirect($oldUser->role . '/profile')->with('success', 'Welcome, ' . $oldUser->first_name. ' '. $oldUser->last_name . '!');
            } else {
                // If the user doesn't exist, handle the case accordingly
                return redirect()->route('login')->with('error', 'No user found with this social account.');
            }
        } catch (\Exception $e) {
            // Handle errors gracefully
            return redirect()->route('login')->with('error', 'Something went wrong! Please try again.');
        }
    }


    public function redirectToYahoo(){
        return Socialite::driver('yahoo')->redirect();
    }

    public function yahooCallback()
    {
        try {
            $user = Socialite::driver('yahoo')->user();

            // Check if the user already exists based on social_id or email
            $oldUser = User::where('social_id', $user->id)
                ->orWhere('email', $user->email)
                ->first();

            if ($oldUser->role ? 'vendor' : 'user') {
                // User exists, log them in
                Auth::login($oldUser);

                // Update user data (if needed)
                $oldUser->update([
                    // This might not be necessary since you're using Google login
                    // 'role' => $user->role ? 'vendor' : 'user',
                    'social_type' => 'yahoo',
                    'social_id' => $user->id,
                ]);
                // dd($oldUser->role);

                // Redirect based on their role
                return redirect($oldUser->role . '/profile')->with('success', 'Welcome, ' . $oldUser->first_name. ' '. $oldUser->last_name . '!');
            } else {
                // If the user doesn't exist, handle the case accordingly
                return redirect()->route('login')->with('error', 'No user found with this social account.');
            }
        } catch (\Exception $e) {
            // Handle errors gracefully
            return redirect()->route('login')->with('error', 'Something went wrong! Please try again.');
        }
    }



}
