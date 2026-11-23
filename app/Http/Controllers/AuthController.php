<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
		        return redirect()->route('dashboard');
        }
    }

    public function login(Request $request)
    {
        // Cek validasi input form login
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah $credentials tersedia di database
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Set session
            $request->session()->regenerate();

            // Simpan waktu login
            session(['last_login' => now()]);

            // Diarahkan ke halaman dashboard
            return redirect()->intended(route('dashboard'))
                ->with('success', 'Login berhasil!');
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}