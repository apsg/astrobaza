<?php
namespace App\Transformers;

use Carbon\Carbon;
use Illuminate\Support\Arr;
use League\Fractal\TransformerAbstract;

class WeatherTransformer extends TransformerAbstract
{
    public function transform($dailyData)
    {
        return [
            'date'        => Carbon::createFromTimestamp($dailyData['dt'])->format('Y-m-d'),
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
