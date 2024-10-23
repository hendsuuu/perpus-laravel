<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Menu;
use App\Models\Posting;
use App\Models\PostingLike;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class LikeController extends Controller
{
    //
    public function index()
    {
        // Mengambil semua komentar dengan relasi user
        if (Auth::user()->id_jenis_user == 1) {
            $likes = PostingLike::with('user')->get();
        } else {
            $likes = PostingLike::with('user')->where('USER_ID', Auth::id())->get();
        }

        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();

        return view('like.index', compact('likes', 'menus'));
    }
    public function create()
    {

        $postings = Posting::all();
        $users = User::all();
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();

        return view('like.create', compact('postings', 'postings', 'menus', 'users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'POSTING_ID' => 'required',
            'USER_ID' => 'required',
        ]);

        PostingLike::create([
            'LIKE_ID' => uniqid(),
            'POSTING_ID' => $request->POSTING_ID,
            'USER_ID' => $request->USER_ID,
        ]);

        return redirect()->route('like.index')->with('success', 'Komentar berhasil ditambahkan');
    }

    // Menampilkan form edit komentar
    public function edit($id)
    {
        $like = PostingLike::findOrFail($id);
        $postings = Posting::all();
        $users = User::all();
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        return view('like.edit', compact('like', 'postings', 'menus', 'users'));
    }

    // Update komentar di database
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'POSTING_ID' => 'required|exists:posting,POSTING_ID',
        ]);

        $like = PostingLike::findOrFail($id);

        // Admin bisa memilih USER_ID, user biasa hanya update komennya
        if (Auth::user()->id_jenis_user == 1) {
            $request->validate([
                'USER_ID' => 'required|exists:users,id_user',
            ]);
            $like->USER_ID = $request->USER_ID;
        }

        // Update like
        $like->POSTING_ID = $request->POSTING_ID;

        $like->save();

        return redirect()->route('like.index')->with('success', 'like berhasil diperbarui.');
    }
    // Menghapus komentar dari database
    public function destroy($id)
    {
        $like = PostingLike::findOrFail($id);
        $like->delete();

        return redirect()->route('like.index')->with('success', 'like berhasil dihapus');
    }
}
