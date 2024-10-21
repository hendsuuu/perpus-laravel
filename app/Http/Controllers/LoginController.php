<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Closure;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('login');  // Pastikan view 'login' ada di resources/views/login.blade.php
    }

    /**
     * Menghandle proses login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Ambil kredensial (email dan password) dari input
        $credentials = $request->only('email', 'password');

        // Coba login menggunakan Auth::attempt()
        if (Auth::attempt($credentials)) {
            Log::info('User logged in: ' . $request->email);
            return redirect()->intended('/dashboard');
        } else {
            Log::warning('Login attempt failed for: ' . $request->email);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    /**
     * Menghandle proses logout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Invalidasi sesi
        $request->session()->invalidate();

        // Regenerasi token CSRF
        $request->session()->regenerateToken();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('success', 'Kamu berhasil logout');
    }

    /**
     * Menangani tindakan setelah login berhasil.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return void
     */
    protected function authenticated(Request $request, $user)
    {
        // Update status user menjadi 'aktif' setelah login berhasil
        $user->status_user = 'aktif';
        $user->save();
    }

    /**
     * Middleware untuk menangani user non-admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // Jika user belum login, redirect ke halaman login
        if (!auth()->check()) {
            return redirect('/login');
        }

        // Jika user bukan admin, redirect ke halaman home
        if (auth()->user()->role != 'admin') {
            return redirect('/dashboard');
        }

        return $next($request);
    }

    /**
     * Method tambahan untuk menangani request login proses (debugging).
     */
    public function login_proses(Request $request)
    {
        dd($request->all());  // Untuk debugging, akan dump semua input request
    }
}
