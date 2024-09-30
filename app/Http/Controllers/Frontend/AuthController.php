<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function show()
    {
        return view('frontend.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:100'],
            'password' => ['required'],
        ]);


        $credentials = $request->only('username', 'password');
        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return redirect()->back()->with('username_error', 'Username not found.')->withInput($request->except('password'));
        }
        if ($user && !Auth::attempt($credentials)) {
            return redirect()->back()->with('password_error', 'Incorrect password.')->withInput($request->except('password'));
        }
        Auth::login($user);

            if ($user->role == 'admin') {
                return redirect('/admin/profile');
            } elseif ($user->role == 'vendor') {
                return redirect('/vendor/profile');
            } else{
                return redirect('/user/profile');
            }
        }
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}