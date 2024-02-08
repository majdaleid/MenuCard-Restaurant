<?php

namespace App\Controller\Admin;

use App\Entity\Gericht;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;

class GerichtCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Gericht::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('name'),
            ImageField::new('bild')
                ->setBasePath('bilder') // The base path is where images are served from
                ->setUploadDir('public/bilder') // The upload directory (relative to your project directory)
                ->setUploadedFileNamePattern('[randomhash].[extension]') // Optional: rename files upon upload
                ->setRequired(false),
            TextField::new('beschreibung'),
            NumberField::new('preis'),
            AssociationField::new('kategorie'),
        ];
    }
}
