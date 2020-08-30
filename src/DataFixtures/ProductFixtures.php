<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
         $product = new Product();
         $product->setName("testas");
         $product->setSku("TS_01");
         $product->setPrice(5.50);
         $manager->persist($product);

        $manager->flush();
    }
}
