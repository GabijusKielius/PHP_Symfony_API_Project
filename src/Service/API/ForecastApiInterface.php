<?php


namespace App\Service\API;


interface ForecastApiInterface
{
    public function getForecastDataInArray(string $city);

    public function getWeatherConditionEnum(string $conditionType);

}