<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Menampilkan daftar semua buku.
     */
    public function index()
    {
        $bukus = Buku::with('kategori')->get(); // Mengambil semua buku beserta kategori
        return view('buku.index', compact('bukus'));
    }

    /**
     * Menampilkan form untuk membuat buku baru.
     */
    public function create()
    {
        $kategoris = Kategori::all(); // Mengambil semua kategori untuk dropdown
        return view('buku.create', compact('kategoris'));
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

        Buku::create($request->all());

        return redirect()->route('buku.index');
    }

    /**
     * Menampilkan detail buku berdasarkan ID.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Menampilkan form untuk mengedit buku.
     */
    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategoris = Kategori::all(); // Mengambil semua kategori
        return view('buku.edit', compact('buku', 'kategoris'));
    }


    /**
     * Memperbarui buku di database.
     */
    public function update(Request $request, Buku $buku, $id)
    {
        $request->validate([
            'kode' => 'required|string|max:20',
            'judul' => 'required|string|max:500',
            'pengarang' => 'required|string|max:200',
            'id_kategori' => 'required|exists:kategori,id_kategori', // Validasi foreign key
        ]);

        $buku->update($request->all());

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
