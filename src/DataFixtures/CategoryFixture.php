<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $category = new Category();
            $category->setName('Category #' . $i);

            $manager->persist($category);
        }
        $manager->flush();

        $categoryRepository = $manager->getRepository(Category::class);
        for ($i = 10; $i < 20; $i++) {
            $parent = $categoryRepository->findBy(['name' => 'Category #' . ($i - 10)]);
            $category = new Category();
            $category->setParent($parent ? $parent[0] : null);
            $category->setName('Category #' . $i);

            $manager->persist($category);
        }

        $manager->flush();
    }
}
