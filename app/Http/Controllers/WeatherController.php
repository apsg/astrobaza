<?php
namespace App\Http\Controllers;

use App\Transformers\WeatherTransformer;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class WeatherController
{
    public function getWeather()
    {
//        $result = Cache::remember('weather', 24 * 60, function () {
        $result = Http::get("http://api.openweathermap.org/data/2.5/onecall?appid="
            . env('MIX_OPENWEATHER_ID')
            . "&lat=53.408018&lon=18.445799&exclude=current,minutely,hourly,alerts&units=metric&lang=pl");
//        });

        \Log::info(__FUNCTION__, [
            "r" => $result,
        ]);

        return fractal($result['daily'], new WeatherTransformer())->toArray();
    }
}
