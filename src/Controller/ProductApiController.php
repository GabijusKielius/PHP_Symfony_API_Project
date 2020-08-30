<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ProductApiController extends AbstractController
{
    /**
     * @Route("/api/products/{city}", requirements={"city": "^\w+$"}, name="product_api", methods={"POST", "GET"})
     */
    public function index(string $city)
    {
        dump($city);

        return new JsonResponse(
            [
                "city" => $city
            ]
        );
    }
}
