<?php


namespace App\Service\API;


use App\Enum\WeatherConditionEnum;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MeteoForecastApi implements ForecastApiInterface
{
    /**
     * @var HttpClientInterface
     */
    private $client;

    public $forecastTime = "forecastTimeUtc";
    public $forecastConditionType = "conditionCode";

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getForecastDataInArray(string $city): array
    {
        $response = $this->client->request(
            'GET',
            "https://api.meteo.lt/v1/places/${city}/forecasts/long-term"
        );

        return json_decode($response->getContent(), true)['forecastTimestamps'];
    }

    public function getWeatherConditionEnum(string $conditionType)
    {
        switch ($conditionType)
        {
            case 'clear':
                return WeatherConditionEnum::clear;
            case 'isolated-clouds':
                return WeatherConditionEnum::isolated_clouds;
            case 'scattered-clouds':
                return WeatherConditionEnum::scattered_clouds;
            case 'overcast':
                return WeatherConditionEnum::overcast;
            case 'light-rain':
                return WeatherConditionEnum::light_rain;
            case 'moderate-rain':
                return WeatherConditionEnum::moderate_rain;
            case 'heavy-rain':
                return WeatherConditionEnum::heavy_rain;
            case 'sleet':
                return WeatherConditionEnum::sleet;
            case 'light-snow':
                return WeatherConditionEnum::light_snow;
            case 'moderate-snow':
                return WeatherConditionEnum::moderate_snow;
            case 'heavy-snow':
                return WeatherConditionEnum::heavy_snow;
            case 'fog':
                return WeatherConditionEnum::fog;
            case 'na':
                return WeatherConditionEnum::na;
        }
    }
}