<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i <= 15; $i++) {
            $product = new Product();
            $product->setName('Product ' . $i);
            $product->setPrice(50);
            $product->setStock(mt_rand(0, 50));
            $manager->persist($product);
        }

        $manager->flush();
    }
}
