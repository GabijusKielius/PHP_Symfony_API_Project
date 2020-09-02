<?php


namespace App\Service;


use App\Repository\ProductRepository;
use App\Service\API\MeteoForecastApi;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class WeatherProductRecommendationService
{
    /**
     * @var MeteoForecastApi
     */
    private $forecastApi;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var Serializer
     */
    private $serializer;

    public function __construct(
        MeteoForecastApi $forecastApi,
        ProductRepository $productRepository,
        SerializerInterface $serializer
    ) {
        $this->forecastApi = $forecastApi;
        $this->productRepository = $productRepository;
        $this->serializer = $serializer;
    }

    public function getRecommendedProductsFromWeatherData(array $weatherData)
    {
        $forecastCountArray = $this->getConditionOccurrencesArray($weatherData);

        return $this->getRecommendationsFromMostOccurringWeatherCondition($forecastCountArray);
    }

    private function getConditionOccurrencesArray(array $weatherData): array
    {
        $forecastKeyArray = [];
        $forecastCountArray = [];

        foreach ($weatherData as $x) {
            $date = new \DateTime($x[$this->forecastApi->forecastTime]);
            $forecastKeyArray[$date->format("Y-m-d")][] = $x[$this->forecastApi->forecastConditionType];
        }

        foreach ($forecastKeyArray as $key => $date) {
            $weatherConditionOccurrenceArray = array_count_values($date);

            array_multisort($weatherConditionOccurrenceArray, SORT_DESC);

            $forecastCountArray[$key] = $weatherConditionOccurrenceArray;
        }
        return $forecastCountArray;
    }

    private function getRecommendationsFromMostOccurringWeatherCondition(array $forecastCountArray): array
    {
        $recommendations = [];
        $dateEnd = new \DateTime('+2 day');

        foreach ($forecastCountArray as $date => $occurrenceArray) {

            $dateInDateTime = new \DateTime($date);

           if($dateInDateTime < $dateEnd){
            $recommendation = [];

            $mostOccurringWeatherCondition = array_keys($occurrenceArray)[0];
            $mostOccurringWeatherConditionEnum = $this->forecastApi->getWeatherConditionEnum(
                $mostOccurringWeatherCondition
            );
            $recommendation['weather_forecast'] = $mostOccurringWeatherCondition;
            $recommendation['date'] = $date;
            $recommendation['products'] = $this->productRepository->findAllProductsByWeatherCondition($mostOccurringWeatherConditionEnum);

            $recommendations[] = $recommendation;
           }
        }

        return $recommendations;
    }
}