<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Testing extends Controller
{
    //
    public function index()
    {
        $users = User::with('role')->get(); // Mengambil semua buku beserta kategori
        return view('user.index', compact('users'));
    }

    /**
     * Menampilkan form untuk membuat buku baru.
     */
    public function create()
    {
        $roles = Role::all(); // Mengambil semua kategori untuk dropdown
        return view('user.create', compact('roles'));
    }

    public function store(Request $request, User $user)
    {
        $request->validate([
            'nama_user' => 'required|string|max:60',
            'password' => 'required|string',
            'email' => 'required|email|unique:users',
            'no_hp' => 'required|string|max:30',
            'status_user' => 'required|string|max:5',
            'id_jenis_user' => 'required|exists:jenis_user,id_jenis_user',
        ]);

        // Simpan password sebagai teks biasa
        $user = User::create([
            'nama_user' => $request->nama_user,
            'password' => $request->password, // Simpan password tanpa hashing
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'status_user' => $request->status_user,
            'id_jenis_user' => $request->id_jenis_user,
        ]);

        return redirect()->route('user.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    /**
     * Memperbarui buku di database.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama_user' => 'required|string|max:200',
            'email' => 'required|string|max:200',
            'no_hp' => 'required|string|max:30',
            'id_jenis_user' => 'required|exists:jenis_user,id_jenis_user',
        ]);

        $user->fill($request->only(['nama_user', 'email', 'no_hp', 'id_jenis_user']))->save();

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect()->route('user.index');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }


    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba login
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Login sukses
            return redirect('/dashboard'); // Ganti '/dashboard' dengan route tujuan setelah login
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function Register(Request $request)
    {
        $user = [
            'nama_user' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        User::create($user);

        return redirect('login')->with('success', 'Berhasil Register');
    }
    public function showRegistrationForm()
    {
        return view('layouts.register');
    }

    public function Logout(Request $request)
    {
        echo "ini untuk logout";
        Auth::logout();

        if (Auth::check()) {
            echo "sudah Login";
        } else {
            echo "Belum Login";
        }
    }
}
