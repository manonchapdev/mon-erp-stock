<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;
use App\Entity\Category;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

               
        $categories = [];
        $names = ['Électronique', 'Bureau', 'Logistique'];

        foreach ($names as $name) {
            $category = new Category();
            $category->setName($name);
            $manager->persist($category);
            $categories[] = $category; 
        }

        for ($i = 0; $i <= 15; $i++) {
            $product = new Product();
            $product->setName('Product ' . $i);
            $product->setPrice(50);
            $product->setStock(mt_rand(0, 50));
            $product->setCategory($categories[array_rand($categories)]); // On associe une catégorie aléatoire
            $manager->persist($product);
        }

        $manager->flush();
    }
}
