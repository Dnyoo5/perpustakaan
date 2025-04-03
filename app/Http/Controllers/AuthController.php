<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
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


    public function showRegister()
    {
        return view('auth.register');
    }


    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'alamat' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'nama.required' => 'Nama lengkap harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'alamat.required' => 'Alamat harus diisi.',
            'password.required' => 'Password harus diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Simpan data ke database
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'role' => 'member', // Default role
        ]);

        // Redirect ke halaman login atau dashboard
        return redirect()->route('login.form')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
