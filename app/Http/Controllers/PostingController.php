<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Posting;
use App\Models\PostingLike;
use App\Models\PostingKomentar;
use App\Services\WeatherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;




class PostingController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        // $this->middleware('auth');
        $this->weatherService = $weatherService;
    }

    public function index()
    {
        // Mengambil semua data posting beserta likes dan comments-nya
        $postings = Posting::with(['likes', 'comments.user', 'sender'])->get();

        // Panggil API BMKG
        $response = Http::get('https://data.bmkg.go.id/DataMKG/TEWS/autogempa.json');

        // Cek apakah respons berhasil
        if ($response->successful()) {
            // Ambil data gempa
            $gempa = $response->json()['Infogempa']['gempa'];
        } else {
            $gempa = null;
        }

        // Mengambil data cuaca
        $country = 'Indonesia';
        $weatherData = $this->weatherService->getWeather($country);
        // dd($weatherData);
        // Ambil role user yang sedang login
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        // Kirim data posting, cuaca, dan gempa ke view
        return view('dashboard', compact('postings', 'weatherData', 'gempa', 'menus'));
    }

    public function posting()
    {

        if (Auth::user()->id_jenis_user == 1) {
            $postings = Posting::with('sender')->get();
        } else {
            $postings = Posting::with('sender')
                ->where('SENDER', Auth::id())    
                ->get();
        }
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        return view('posting.index', compact('postings', 'menus'));
    }
    public function add()
    {

        $postings = Posting::All();
        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        return view('posting.create', compact('postings', 'menus'));
    }
    public function edit($id)
    {

        $userRole = Auth::user()->id_jenis_user;

        // Ambil menu berdasarkan role user
        $menus = Menu::where('id_level', $userRole)->get();
        $posting = Posting::findOrFail($id);

        // Tampilkan halaman edit dan kirim data posting
        // return view('posting.edit', compact('posting'));
        return view('posting.edit', compact('posting', 'menus'));
    }
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'message_text' => 'required|string|max:255',
            // 'sender' => 'required',
            'message_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Cari posting berdasarkan ID
        $posting = Posting::findOrFail($id);

        // Update data posting
        $posting->message_text = $request->message_text;
        // $posting->sender = $request->sender;

        // Jika ada gambar baru yang diupload
        if ($request->hasFile('message_gambar')) {
            // Hapus gambar lama jika ada
            if ($posting->message_gambar) {
                Storage::delete('uploads/' . $posting->message_gambar);
            }

            // Simpan gambar baru
            $imageName = time() . '.' . $request->message_gambar->extension();
            $request->message_gambar->move(public_path('uploads'), $imageName);

            // Simpan nama file gambar ke database
            $posting->message_gambar = $imageName;
        }

        // Simpan perubahan
        $posting->save();

        // Redirect kembali ke halaman yang diinginkan dengan pesan sukses
        return redirect()->route('posting.index')->with('success', 'Posting berhasil diperbarui!');
    }
    public function destroy($id)
    {


        $menu = Posting::findOrFail($id); // Mencari menu berdasarkan ID
        $menu->delete(); // Hapus menu

        return redirect()->route('posting.index')->with('success', 'Menu berhasil dihapus.');
    }

    public function create(Request $request)
    {
        // Validasi input
        $request->validate([
            // 'sender' => 'required|string',
            'message_text' => 'required|string',
            'message_gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        // Buat objek Posting baru
        $posting = new Posting();
        $posting->POSTING_ID = uniqid();
        $posting->SENDER = Auth::id();
        $posting->MESSAGE_TEXT = $request->message_text;
        $posting->CREATE_BY = $request->create_by;
        $posting->CREATE_DATE = now();

        // Cek apakah ada gambar yang diunggah
        if ($request->hasFile('message_gambar')) {
            $file = $request->file('message_gambar');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama unik untuk file
            $file->move(public_path('uploads'), $fileName); // Pindahkan file ke folder 'public/uploads'

            // Simpan nama file ke dalam database
            $posting->MESSAGE_GAMBAR = $fileName;
        }

        // Simpan posting ke database
        $posting->save();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Posting created successfully!');
    }
    public function likePost($postingId)
    {
        $userId = Auth::id(); // ID user yang sedang login

        // Periksa apakah user sudah memberikan like pada postingan ini
        $existingLike = PostingLike::where('POSTING_ID', $postingId)
            ->where('USER_ID', $userId)
            ->first();

        if ($existingLike) {
            // Jika sudah like, hapus like (unlike)
            $existingLike->delete();

            return response()->json([
                'status' => 'unliked',
                'message' => 'Like removed.'
            ]);
        } else {
            // Jika belum like, tambahkan like
            PostingLike::create([
                'LIKE_ID' => uniqid(), // Buat LIKE_ID sebagai UUID
                'POSTING_ID' => $postingId,
                'USER_ID' => $userId,
                'CREATE_DATE' => now(),
                'DELETE_MARK' => 0, // 0 untuk menunjukkan bahwa like aktif
                'UPDATE_BY' => $userId,
                'UPDATE_DATE' => now(),
            ]);

            return response()->json([
                'status' => 'liked',
                'message' => 'Post liked.'
            ]);
        }
    }

    public function like($postingId, $userId)
    {
        $like = new PostingLike();
        $like->LIKE_ID = uniqid();
        $like->POSTING_ID = $postingId;
        $like->USER_ID = Auth::id();
        $like->CREATE_DATE = now();
        $like->save();

        return redirect()->back()->with('success', 'Like added successfully!');
    }

    public function comment(Request $request, $postingId)
    {
        $comment = new PostingKomentar();
        $comment->KOMEN_ID = uniqid();
        $comment->POSTING_ID = $postingId;
        $comment->USER_ID = Auth::id();
        $comment->KOMENTAR_TEXT = $request->komentar_text;
        $comment->KOMENTAR_GAMBAR = $request->komentar_gambar;
        $comment->CREATE_BY = $request->create_by;
        $comment->CREATE_DATE = now();
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    // // Method untuk mengambil data cuaca
    private function getWeatherData()
    {
        // Anda perlu menyesuaikan logika ini untuk mengambil data cuaca menggunakan API Anda
        return [
            'location' => [
                'name' => 'Jakarta',
            ],
            'current' => [
                'temperature' => 30,
                'weather_icons' => ['https://example.com/icon.png'],
                'weather_descriptions' => ['Clear sky'],
                'wind_speed' => 10,
                'humidity' => 80,
            ],
        ];
    }
}
