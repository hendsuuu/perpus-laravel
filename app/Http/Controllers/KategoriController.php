<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class KategoriController extends Controller
{
    /**
     * Menampilkan daftar semua kategori.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        return view('kategori.index', compact('kategoris', 'menus'));
    }

    /**
     * Menampilkan form untuk membuat kategori baru.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        return view('kategori.create',compact('kategoris','menus'));
    }

    /**
     * Menyimpan kategori baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:200',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategori.index');
    }
    public function edit($id)
    {
        // Ambil kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();

        // Tampilkan halaman edit dan kirim data kategori
        return view('kategori.edit', compact('kategori', 'menus'));

    }
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        // Cari kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);

        // Update nama kategori
        $kategori->nama_kategori = $request->nama_kategori;

        // Simpan perubahan
        $kategori->save();

        // Redirect kembali ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }
    public function destroy($id)
    {
        // Cari kategori berdasarkan ID
        $kategori = Kategori::findOrFail($id);

        // Hapus kategori
        $kategori->delete();

        // Redirect kembali ke halaman daftar kategori dengan pesan sukses
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
    // /**
    //  * Menampilkan detail kategori berdasarkan ID.
    //  */
    // public function show(Kategori $kategori)
    // {
    //     return view('kategori.show', compact('kategori'));
    // }
}
