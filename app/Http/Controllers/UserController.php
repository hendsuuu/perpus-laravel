<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


use Illuminate\Http\Request;

class UserController extends Controller
{
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
            // 'nama_user' => 'required|string|max:60',
            'password' => 'required|string',
            'email' => 'required|email|unique:users',
            'no_hp' => 'required|string|max:30',
            'status_user' => 'required|string|max:5',
            'id_jenis_user' => 'required',
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

    public function update(Request $request, $id_user)
    {
        // Validasi input
        $request->validate([
            'nama_user' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_hp' => 'required|string|max:20',
            'status_user' => 'required|string|max:255',
            'id_jenis_user' => 'required',
        ]);
        
        // Ambil user berdasarkan ID
        $user = User::findOrFail($id_user);
        $user->update($request->all());
        // $user->nama_user = $request->nama_user;
        // $user->email = $request->email;
        // $user->no_h = $request->no_hp;
        // $user->status_user = $request->status_user;
        // $user->id_jenis_user = $request->id_jenis_user;

        // $user->save();

        // Update data user
        // $user->update([
        //     'nama_user' => $request->nama_user,
        //     'email' => $request->email,
        //     'no_hp' => $request->no_hp,
        //     'status_user' => $request->status_user,
        //     'id_jenis_user' => $request->id_jenis_user,
        // ]);

        // Redirect ke halaman daftar user dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
