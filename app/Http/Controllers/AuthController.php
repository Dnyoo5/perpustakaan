<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->role === 'superadmin') {
                return redirect()->intended('dashboard');
            } elseif ($user->role === 'admin') {
                return redirect()->intended('dashboard'); 
            } elseif ($user->role === 'member') {
                return redirect()->intended('home');
            } 
        }

            return back()->withErrors([
                'login' => 'Username atau Password salah.',
            ])->withInput(); // pastikan input email tetap terisi setelah error
    
    
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

}