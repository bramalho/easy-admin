<?php

namespace App\Controller;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel('Basic information'),
            AssociationField::new('categories')->hideOnIndex(),
            TextField::new('sku'),
            TextField::new('name'),
            NumberField::new('price'),

            FormField::addPanel('Product Details'),
            ImageField::new('image'),
            TextareaField::new('description')->hideOnIndex(),

            FormField::addPanel(),
            ArrayField::new('attributes')->hideOnIndex(),
            BooleanField::new('available')
        ];
    }
}
