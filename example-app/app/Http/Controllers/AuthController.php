<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerPage() {
        return view('register');
    }

    public function register(Request $request) {
        $request->validate([
            'namaLengkap' => 'required|unique:users,namaLengkap|min:3|max:40',
            'email' => 'required|email:dns',
            'password' => 'required|min:6|max:12',
            'nomorHandphone' => 'required|regex:/(08)/'
        ]);

        User::create([
            'namaLengkap' => $request -> namaLengkap,
            'email' => $request -> email,
            'password' => Hash::make($request -> password),
            'nomorHandphone' => $request -> nomorHandphone
        ]);
        return redirect('/');
    }

    public function loginPage() {
        return view('login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
