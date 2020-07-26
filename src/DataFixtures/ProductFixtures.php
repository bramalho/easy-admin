<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $product = new Product();
            $product->setSku(($i + 1) * 100);
            $product->setName('Product #' . $i);
            $product->setAttributes([
                'type_a' => ($i + 1),
                'type_b' => ($i + 1)
            ]);

            $manager->persist($product);
        }

        $manager->flush();
    }
}