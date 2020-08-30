<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductApiController extends AbstractController
{
    /**
     * @Route("/product/api", name="product_api")
     */
    public function index()
    {
        return $this->render('product_api/index.html.twig', [
            'controller_name' => 'ProductApiController',
        ]);
    }
}
