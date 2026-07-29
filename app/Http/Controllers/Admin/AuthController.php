<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

       if (Auth::attempt($credentials)) {

    $request->session()->regenerate();

    if (Auth::user()->role == 'superadmin') {
        return redirect()->route('admin.dashboard');
    }

    if (Auth::user()->role == 'organizer') {
        return redirect()->route('organizer.dashboard');
    }

    Auth::logout();

    return back()->withErrors([
        'email' => 'Akun ini tidak memiliki akses.',
    ]);
}
        return back()->withErrors([
            'email' => 'Email atau Password yang Anda berikan tidak terdaftar di rekam kami',
        ]);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
