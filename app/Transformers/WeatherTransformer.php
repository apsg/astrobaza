<?php
namespace App\Transformers;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use League\Fractal\TransformerAbstract;

class WeatherTransformer extends TransformerAbstract
{
    public function transform($dailyData)
    {
        $date = Carbon::createFromTimestamp($dailyData['dt']);

        return [
            'date'        => $date->format('Y-m-d'),
            'day'         => $date->locale(App::getLocale())->dayName,
            'sunset'      => $this->processHour($dailyData['sunset']),
            'temp'        => round(Arr::get($dailyData, 'temp.eve')),
            'clouds'      => Arr::get($dailyData, 'clouds'),
            'description' => Arr::get($dailyData, 'weather.0.description'),
            'icon'        => $this->getIcon($dailyData),
        ];
    }

    private function processHour($timestamp) : string
    {
        return Carbon::createFromTimestamp($timestamp)
            ->timezone('Europe/Warsaw')
            ->format('H:i');
    }

    private function getIcon($dailyData)
    {
        $code = Arr::get($dailyData, 'weather.0.icon');

        return "http://openweathermap.org/img/wn/{$code}@2x.png";
    }
}
