<?php


namespace App\Service\API;


use Symfony\Contracts\HttpClient\HttpClientInterface;

class MeteoForecastApi implements ForecastApiInterface
{
    /**
     * @var HttpClientInterface
     */
    private $client;

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

        return json_decode($response->getContent(), true);
    }
}