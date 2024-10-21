<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Menampilkan daftar semua kategori.
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    /**
     * Menampilkan form untuk membuat kategori baru.
     */
    public function create()
    {
        return view('kategori.create');
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

    // /**
    //  * Menampilkan detail kategori berdasarkan ID.
    //  */
    // public function show(Kategori $kategori)
    // {
    //     return view('kategori.show', compact('kategori'));
    // }
}
