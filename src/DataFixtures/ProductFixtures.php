<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    private static $productNames = [
        'Red Hat',
        'Black Umbrella',
        'Big boy boots'
    ];

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        $product = new Product();
        $product->setName($faker->randomElement(self::$productNames));
        $product->setSku($faker->uuid);
        $product->setPrice($faker->randomFloat(2,0.01,100000));
        $manager->persist($product);

        $manager->flush();
    }
}
