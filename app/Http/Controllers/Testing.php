<?php

namespace App\Http\Controllers;

use App\Models\Menu;
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
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        return view('user.index', compact('users', 'menus'));
    }

    /**
     * Menampilkan form untuk membuat buku baru.
     */
    public function create()
    {
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        $roles = Role::all(); // Mengambil semua kategori untuk dropdown
        return view('user.create', compact('roles', 'menus'));
    }
    public function edit($id_user)
    {
        $user = User::findOrFail($id_user);
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        $roles = Role::all(); // Mengambil semua kategori untuk dropdown
        return view('user.edit', compact('roles', 'menus', 'user'));
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
        User::create([
            'nama_user' => $request->nama_user,
            'password' => Hash::make($request->password), // Simpan password tanpa hashing
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
    public function update(Request $request, $id_user)
    {
        // Validasi input
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:20',
            'status_user' => 'required|string|max:255',
            'id_jenis_user' => 'required|exists:roles,id_jenis_user',
        ]);

        // Ambil user berdasarkan ID
        $user = User::findOrFail($id_user);

        // Update data user
        $user->update([
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'status_user' => $request->status_user,
            'id_jenis_user' => $request->id_jenis_user,
        ]);

        // Redirect ke halaman daftar user dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
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
