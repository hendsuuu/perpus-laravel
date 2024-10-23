<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Services\WeatherService;

class DashboardController extends Controller
{
    protected $weatherService;
    
    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function index()
    {
        $country = 'Indonesia'; // Ganti ini dengan negara sesuai kebutuhan atau buat input dinamis
        $weatherData = $this->weatherService->getWeather($country);
        $menus = Menu::with('menuLevel')->get();


        return view('dashboard', compact('weatherData', 'weatherData', 'menus' ));
    }
}
