<?php

namespace App\Http\Controllers;

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

        return view('dashboard', compact('weatherData'));
    }
}
