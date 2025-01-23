<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request) {
        return view("pages.auth.login");
    }

    public function submitLogin(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:16'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        } 

        return back()->with(['loginError'=> 'Login failed']);
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->intended('/auth/login');
    }
}
