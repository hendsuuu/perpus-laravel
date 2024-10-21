<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use App\Models\PostingLike;
use App\Models\PostingKomentar;
use App\Services\WeatherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        $postings = Posting::with(['likes', 'comments'])->get();

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

        // Kirim data posting, cuaca, dan gempa ke view
        return view('dashboard', compact('postings', 'weatherData', 'gempa'));
    }
    
    public function create(Request $request)
    {
        $posting = new Posting();
        $posting->POSTING_ID = uniqid();
        $posting->SENDER = $request->sender;
        $posting->MESSAGE_TEXT = $request->message_text;
        $posting->MESSAGE_GAMBAR = $request->message_gambar;
        $posting->CREATE_BY = $request->create_by;
        $posting->CREATE_DATE = now();
        $posting->save();

        return redirect()->back()->with('success', 'Posting created successfully!');
    }

    public function like($postingId, $userId)
    {
        $like = new PostingLike();
        $like->LIKE_ID = uniqid();
        $like->POSTING_ID = $postingId;
        $like->USER_ID = $userId;
        $like->CREATE_DATE = now();
        $like->save();

        return redirect()->back()->with('success', 'Like added successfully!');
    }

    public function comment(Request $request, $postingId)
    {
        $comment = new PostingKomentar();
        $comment->KOMEN_ID = uniqid();
        $comment->POSTING_ID = $postingId;
        $comment->USER_ID = $request->user_id;
        $comment->KOMENTAR_TEXT = $request->komentar_text;
        $comment->KOMENTAR_GAMBAR = $request->komentar_gambar;
        $comment->CREATE_BY = $request->create_by;
        $comment->CREATE_DATE = now();
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    // // Method untuk mengambil data cuaca
    // private function getWeatherData()
    // {
    //     // Anda perlu menyesuaikan logika ini untuk mengambil data cuaca menggunakan API Anda
    //     return [
    //         'location' => [
    //             'name' => 'Jakarta',
    //         ],
    //         'current' => [
    //             'temperature' => 30,
    //             'weather_icons' => ['https://example.com/icon.png'],
    //             'weather_descriptions' => ['Clear sky'],
    //             'wind_speed' => 10,
    //             'humidity' => 80,
    //         ],
    //     ];
    // }

}
