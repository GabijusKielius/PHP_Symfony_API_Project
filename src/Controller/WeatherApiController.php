<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WeatherApiController extends AbstractController
{
    /**
     * @Route("/weather/api", name="weather_api")
     */
    public function index()
    {
        return $this->render('weather_api/index.html.twig', [
            'controller_name' => 'WeatherApiController',
        ]);
    }
}
