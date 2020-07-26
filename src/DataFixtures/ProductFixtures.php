<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $categoryRepository = $manager->getRepository(Category::class);

        for ($i = 0; $i < 10; $i++) {
            $category = $categoryRepository->findBy(['name' => 'Category #' . $i]);
            $product = new Product();
            $product->setSku(($i + 1) * 100);
            $product->setName('Product #' . $i);
            $product->setPrice(rand(100, 1000));
            $product->setDescription('Description for Product #' . $i);
            $product->setAttributes([
                'type_a' => ($i + 1),
                'type_b' => ($i + 1)
            ]);
            $product->setAvailable(rand(0, 1) === 1);
            if ($category) {
                $product->addCategory($category[0]);
            }

            $manager->persist($product);
        }

        $manager->flush();
    }
}
