<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RoleController extends Controller
{
    /**
     * Menampilkan daftar semua kategori.
     */
    public function index()
    {
        $roles = Role::all();
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        return view('role.index', compact('roles', 'menus'));
    }
    public function edit($role)
    {
        $role = Role::findOrFail($role);
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        return view('role.edit', compact('role', 'menus'));
    }
    public function update(Request $request, $role)
    {
        // Validasi input
        $request->validate([
            'jenis_user' => 'required|string|max:255',
        ]);

        // Cari role berdasarkan ID
        $role = Role::findOrFail($role);

        // Update data role
        $role->update([
            'jenis_user' => $request->jenis_user,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('role.index')->with('success', 'Role berhasil diperbarui!');
    }
    /**
     * Menampilkan form untuk membuat kategori baru.
     */
    public function create()
    {
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        return view('role.create', compact('menus'));
    }

    /**z    
     * Menyimpan kategori baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_user' => 'required|string|max:200',
        ]);

        Role::create($request->all());

        return redirect()->route('role.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('role.index');
    }

    // /**
    //  * Menampilkan detail kategori berdasarkan ID.
    //  */
    // public function show(Kategori $kategori)
    // {
    //     return view('kategori.show', compact('kategori'));
    // }
}

