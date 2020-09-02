<?php

namespace App\Controller;

use App\Service\API\MeteoForecastApi;
use App\Service\WeatherProductRecommendationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProductApiController extends AbstractController
{
    /**
     * @Route("/api/products/{city}", requirements={"city": "^\w+$"}, name="product_api", methods={"POST", "GET"})
     */
    public function index(string $city,MeteoForecastApi $forecastApi,WeatherProductRecommendationService $weatherProductRecommendationService)
    {
        try {
            $weatherData = $forecastApi->getForecastDataInArray($city);
            $responseContent = $weatherProductRecommendationService->getRecommendedProductsFromWeatherData($weatherData);
        }catch (\Exception $e){
            $responseContent = ['error'=> $e->getMessage()];
        }

        return new JsonResponse(
            [
                $responseContent
            ]
        );
    }
}
