<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLogin()
    {
        return view('login'); // Gunakan 'login' karena view-nya ada di resources/views/login.blade.php
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'username' => 'required', // Pastikan nama field ini sesuai dengan yang ada di form
            'password' => 'required',
        ]);

        // Cek kredensial
        if (Auth::attempt($credentials)) {
            // Regenerasi session agar lebih aman
            $request->session()->regenerate();
            // Redirect ke halaman yang diminta sebelumnya atau ke dashboard
            return redirect()->route('dashboard.index');
        }

        // Jika login gagal
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    // Proses logout
    public function logout(Request $request)
{
    Auth::logout(); // Logout pengguna
    $request->session()->invalidate(); // Hapus session
    $request->session()->regenerateToken(); // Regenerasi CSRF token

    // Redirect ke halaman login
    return redirect('/login');
}

}
