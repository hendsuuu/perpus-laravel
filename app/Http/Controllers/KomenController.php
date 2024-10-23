<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Menu;
use App\Models\Posting;
use App\Models\PostingKomentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KomenController extends Controller
{
    //
    public function index()
    {
        // Mengambil semua komentar dengan relasi user
        if (Auth::user()->id_jenis_user == 1) {
            $komentars = PostingKomentar::with('user')->get();
        } else {
            $komentars = PostingKomentar::with('user')->where('USER_ID', Auth::id())->get();
        }
        
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();

        return view('komen.index', compact('komentars', 'menus'));
    }
    public function create()
    {
        $postings =  Posting::all();
        $postings = Posting::all();
        $users = User::all();
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();

        return view('komen.create', compact('postings', 'postings', 'menus', 'users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'POSTING_ID' => 'required',
            'USER_ID' => 'required',
            'KOMENTAR_TEXT' => 'required|string',
        ]);

        PostingKomentar::create([
            
            'KOMEN_ID' => uniqid(),
            'POSTING_ID' => $request->POSTING_ID,
            'USER_ID' => $request->USER_ID,
            'KOMENTAR_TEXT' => $request->KOMENTAR_TEXT,
        ]);

        return redirect()->route('komentar.index')->with('success', 'Komentar berhasil ditambahkan');
    }

    // Menampilkan form edit komentar
    public function edit($id)
    {
        $komentar = PostingKomentar::findOrFail($id);
        $postings = Posting::all();
        $users = User::all();
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        return view('komen.edit', compact('komentar','postings', 'menus', 'users'));
    }

    // Update komentar di database
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'POSTING_ID' => 'required|exists:posting,POSTING_ID',
            'KOMENTAR_TEXT' => 'required|string',
        ]);

        $komentar = PostingKomentar::findOrFail($id);

        // Admin bisa memilih USER_ID, user biasa hanya update komennya
        if (Auth::user()->id_jenis_user == 1) {
            $request->validate([
                'USER_ID' => 'required|exists:users,id_user',
            ]);
            $komentar->USER_ID = $request->USER_ID;
        }

        // Update komentar
        $komentar->POSTING_ID = $request->POSTING_ID;
        $komentar->KOMENTAR_TEXT = $request->KOMENTAR_TEXT;

        $komentar->save();

        return redirect()->route('komentar.index')->with('success', 'Komentar berhasil diperbarui.');
    }
    // Menghapus komentar dari database
    public function destroy($id)
    {
        $komentar = PostingKomentar::findOrFail($id);
        $komentar->delete();

        return redirect()->route('komentar.index')->with('success', 'Komentar berhasil dihapus');
    }

}
