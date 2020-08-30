<?php


namespace App\Service;


use App\DTO\WeatherDTO;

class WeatherProductRecommendationService
{
    public function getRecommendedProductsFromWeatherData(array $weatherData)
    {
        // TODO: Return JSON Of recommended products
        // $dto = new WeatherDTO($weatherData);

        dump($weatherData['']);

        //TODO: Array of weather data
        //TODO: 1. Transfer weather data to DTO, for increased readability and stability
        //TODO: 2. Cycle trough [3 days] and get most array of weather contitions
        /*
         * [
         * "2020-08-30" = [
         *      WeatherConditionEnum::rain => 5 (hours),
         *      WeatherConditionEnum::sunny => 2 (hours),
         *      WeatherConditionEnum::sunny => 2 (hours),
         *      ]
         * "2020-08-30" = [
         *      WeatherConditionEnum::rain => 5 (hours),
         *      WeatherConditionEnum::cloudy => 8 (hours),
         *      WeatherConditionEnum::sleek => 10 (hours),
         *      ]
         * ]
         */
        //TODO: 3. Sort (Array above) get most frequent WeatherCondition
        //TODO: 4. Find products for the most frequent WeatherCondition  (Option: Seperate service)
        //TODO: 5. Format ARRAYS to fit example JSON
        /*
         * [
         *  city:
         *  recommendations: [
         *       weather_forecast:
         *      date:
         *      producst: [calculatedProducs]
         *      ]
         * ]
         */


        return null;
    }
}