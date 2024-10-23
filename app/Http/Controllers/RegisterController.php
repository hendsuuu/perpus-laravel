<?php
namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Menampilkan form registrasi.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::all();
        return view('register',compact('roles')); // Pastikan ada view 'register.blade.php'
    }

    /**
     * Menangani proses registrasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // dd($request);
        // Validasi data yang dikirimkan oleh pengguna
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8', // Pastikan kamu menambahkan 'password_confirmation' di form
            'no_hp' => 'required|string|min:8', // Pastikan kamu menambahkan 'password_confirmation' di form
            'id_jenis_user' => 'required|integer', // Pastikan kamu menambahkan 'password_confirmation' di form
            'status_user' => 'required|string', // Pastikan kamu menambahkan 'password_confirmation' di form
        ]);

        // Buat user baru
        User::create([
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password untuk keamanan
            'no_hp' => $request->no_hp,
            'id_jenis_user' => $request->id_jenis_user,
            'status_user' => $request->aktif,
        ]);

        // Redirect ke halaman login setelah registrasi berhasil
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
