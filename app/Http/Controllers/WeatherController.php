<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;

class WeatherController extends Controller
{

    public function showForm()
    {
        return view('form');
    }
    public function getWeather(Request $request)
    {
        $city = $request->input('city', 'Moscow');
        $apiKey = env('WHEATER_API_KEY');
        $apiUrl = "http://api.weatherapi.com/v1/current.json?key={$apiKey}&q={$city}&days=7&aqi=yes";
        $apiUrl = "http://api.weatherapi.com/v1/forecast.json?key={$apiKey}&q={$city}&days=7&aqi=yes&alerts=no";


        $client = new Client();
        $response = $client->get($apiUrl);
        $data = json_decode($response->getBody(), true);

        $currentHour = Carbon::now('Europe/Moscow')->hour;
        $wheatherPerHour = array_slice($data['forecast']['forecastday'][0]['hour'],$currentHour,null,true);
//        dd($data);
//        dd($data['forecast']['forecastday']);
//        dd($wheatherPerHour);
        return view('result', ['data' => $data, 'wheatherPerHour' => $wheatherPerHour]);

    }
}
