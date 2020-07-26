<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\ProductAttribute;
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

            $manager->persist($product);

            $attributeA = new ProductAttribute();
            $attributeA->setProduct($product);
            $attributeA->setType("Type A");
            $attributeA->setValue($i + 1);
            $manager->persist($attributeA);

            $attributeB = new ProductAttribute();
            $attributeB->setProduct($product);
            $attributeB->setType("Type B");
            $attributeB->setValue($i + 1);
            $manager->persist($attributeB);
        }

        $manager->flush();
    }
}
