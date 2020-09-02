<?php


namespace App\Service\API;


interface ForecastApiInterface
{
    public function getForecastDataInArray(string $city);
}