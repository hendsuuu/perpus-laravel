<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Menampilkan daftar semua kategori.
     */
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    /**
     * Menampilkan form untuk membuat kategori baru.
     */
    public function create()
    {
        return view('role.create');
    }

    /**
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

