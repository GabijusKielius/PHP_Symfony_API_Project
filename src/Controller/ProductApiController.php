<?php

namespace App\Controller;

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
    public function index(string $city, HttpClientInterface $client, WeatherProductRecommendationService $weatherProductRecommendationService)
    {
        $response = $client->request(
            'GET',
            "https://api.meteo.lt/v1/places/${city}/forecasts/long-term"
        );

        //TODO: Check if there is content

        //TODO: if there is then find recommended products

        /** @var array $products */
        $products = $weatherProductRecommendationService->getRecommendedProductsFromWeatherData($response->getContent());

        //TODO: else return response with errror


        return new JsonResponse(
            [
                "city" => $city,
                "products" => $products,
            ]
        );
    }
}
