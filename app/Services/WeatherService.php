<?php

namespace App\Services;

use GuzzleHttp\Client;

class WeatherService
{
    protected $client;
    
    public function __construct()
    {
        $this->client = new Client();
    }
    
    public function getWeather($country)
    {
        $apiKey = env('WEATHERSTACK_API_KEY');
        $url = env('WEATHERSTACK_API_URL');
        
        $response = $this->client->get($url, [
            'query' => [
                'access_key' => $apiKey,
                'query' => $country,
                'units' => 'm' // 'm' untuk Celsius, 'f' untuk Fahrenheit
            ]
        ]);
        
        return json_decode($response->getBody()->getContents(), true);
    }
}
