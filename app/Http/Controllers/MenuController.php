<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuLevel;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class MenuController extends Controller
{
    /**
     * Menampilkan daftar semua kategori.
     */
    public function index()
    {
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        $allmenus = Menu::All();
        // Log::info($menus);
        // dd($menus);
        return view('menu.index', compact('menus', 'allmenus'));
    }

    /**
     * Menampilkan form untuk membuat kategori baru.
     */
    public function create()
    {
        $levels = MenuLevel::all();
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        return view('menu.create', compact('levels', 'menus'));
    }

    public function show($slug){

        return view('show',compact('menus',$slug));
    }

    /**
     * Menyimpan kategori baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'menu_name' => 'required|string|max:200',
            'menu_link' => 'required|string|max:200',
            'menu_icon' => 'required|string|max:200',
            'id_level' => 'required|integer', // Pastikan ini integer sesuai dengan tipe data di database
        ]);

        // dd($request->all());
        try {
            Menu::create($request->all());
            return redirect()->route('menu.index')->with('success', 'Menu berhasil ditambahkan.');
        } catch (\Exception $e) {
            // Menangkap error dan menampilkan pesan kesalahan
            return redirect()->route('menu.create')->with('error', 'Gagal menambahkan menu: ' . $e->getMessage())->withInput();
        }
    }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id); // Mencari menu berdasarkan ID
        $menuLevels = MenuLevel::all(); // Ambil semua level menu
        $allmenus = Menu::with('menuLevel')->get();
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        return view('menu.edit', compact('menu', 'menuLevels','menus', 'allmenus'));
    }

    // Mengupdate menu
    public function update(Request $request, $id)
    {
        $request->validate([
            'menu_name' => 'required|string|max:200',
            'menu_link' => 'required|string|max:200',
            'menu_icon' => 'required|string|max:200',
            'id_level' => 'required|integer',
        ]);

        $menu = Menu::findOrFail($id); // Mencari menu berdasarkan ID
        $menu->update($request->all()); // Update menu

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui.');
    }


    // Menghapus menu
    public function destroy($id)
    {
        $menu = Menu::findOrFail($id); // Mencari menu berdasarkan ID
        $menu->delete(); // Hapus menu

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus.');
    }

    // /**
    //  * Menampilkan detail kategori berdasarkan ID.
    //  */
    // public function show(Kategori $kategori)
    // {
    //     return view('kategori.show', compact('kategori'));
    // }
}

