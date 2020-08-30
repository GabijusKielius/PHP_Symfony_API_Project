<?php

namespace App\DataFixtures;

use App\Enum\WeatherConditionEnum;
use Faker\Factory;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    const AMOUNT_TO_GENERATE = 100;

    private static $productNames = [
        'Red Hat',
        'Black Umbrella',
        'Big Boy Boots',
        'Pink Hat',
        'Synergistic Leather Hat',
        'Heavy Duty Iron Hat',
        'Leather Jacket',
        'Flip-flops'
    ];

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        for ($i = 0; $i < self::AMOUNT_TO_GENERATE; $i++)
        {
            $product = new Product();
            $product->setName($faker->randomElement(self::$productNames));
            $product->setSku($faker->uuid);
            $product->setPrice($faker->randomFloat(2,0.01,500));
            $product->setWeatherCondition($faker->randomElement(WeatherConditionEnum::getAllWeatherConditions()));
            $manager->persist($product);
        }

        $manager->flush();
    }
}
