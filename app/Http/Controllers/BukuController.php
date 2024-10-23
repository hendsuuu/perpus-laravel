<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class BukuController extends Controller
{
    /**
     * Menampilkan daftar semua buku.
     */
    public function index()
    {
        if (Auth::user()->id_jenis_user == 1) {
            $bukus = Buku::with('kategori')->get();
        } else {
            $bukus = Buku::with('kategori')->where('id_user', Auth::id())->get(); // Mengambil semua buku beserta kategori
        }
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        return view('buku.index', compact('bukus', 'menus'));
    }

    /**
     * Menampilkan form untuk membuat buku baru.
     */
    public function create()
    {
        $kategoris = Kategori::all(); // Mengambil semua kategori untuk dropdown
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        $bukus = Buku::with('kategori')->get();
        return view('buku.create', compact('kategoris', 'bukus', 'menus'));
    }

    /**
     * Menyimpan buku baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:20',
            'judul' => 'required|string|max:500',
            'pengarang' => 'required|string|max:200',
            'id_kategori' => 'required|exists:kategori,id_kategori', // Validasi foreign key
        ]);

        // Buku::create($request->all());
        Buku::create([
            'kode' => $request->kode,
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'id_kategori' => $request->id_kategori,
            'id_user' => Auth::id(),
        ]);

        return redirect()->route('buku.index');
    }

    /**
     * Menampilkan detail buku berdasarkan ID.
     */
    public function show(Buku $buku)
    {
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        return view('buku.show', compact('buku', 'menus'));
    }

    /**
     * Menampilkan form untuk mengedit buku.
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategoris = Kategori::all(); // Mengambil semua kategori
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        return view('buku.edit', compact('buku', 'kategoris', 'menus'));
    }


    /**
     * Memperbarui buku di database.
     */
    public function update(Request $request, $buku)
    {
        $request->validate([
            'judul' => 'required|string|max:500',
            'pengarang' => 'required|string|max:200',
            'id_kategori' => 'required', // Validasi foreign key
        ]);

        $buku = Buku::where('kode', $buku)->firstOrFail();

        $buku->judul = $request->judul;
        $buku->pengarang = $request->pengarang;
        $buku->id_kategori = $request->id_kategori;

        $buku->save();

        return redirect()->route('buku.index');
    }

    /**
     * Menghapus buku dari database.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();

        return redirect()->route('buku.index');
    }
}
