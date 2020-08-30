<?php

namespace App\Enum;

abstract class WeatherConditionEnum
{
    const clear = 0;
    const isolated_clouds = 1;
    const scattered_clouds = 2;
    const overcast = 3;
    const light_rain = 4;
    const moderate_rain = 5;
    const heavy_rain = 6;
    const sleet = 7;
    const light_snow = 8;
    const moderate_snow = 9;
    const heavy_snow = 10;
    const fog = 11;
    const na = 12;

    static public function getAllWeatherConditions()
    {
        return [
            self::clear,
            self::isolated_clouds,
            self::scattered_clouds,
            self::overcast,
            self::light_rain,
            self::moderate_rain,
            self::heavy_rain,
            self::sleet,
            self::light_snow,
            self::moderate_snow,
            self::heavy_snow,
            self::fog,
            self::na,
        ];
    }
}

