<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Menampilkan daftar semua kategori.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    /**
     * Menampilkan form untuk membuat kategori baru.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Menyimpan kategori baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required|string|max:200',
        ]);

        Menu::create($request->all());

        return redirect()->route('menu.index');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menu.index');
    }

    // /**
    //  * Menampilkan detail kategori berdasarkan ID.
    //  */
    // public function show(Kategori $kategori)
    // {
    //     return view('kategori.show', compact('kategori'));
    // }
}

