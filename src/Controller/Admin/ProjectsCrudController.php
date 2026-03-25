<?php

namespace App\Controller\Admin;

use App\Entity\Projects;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProjectsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Projects::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $pictureField = ImageField::new('picture', 'Image')
            ->setBasePath('uploads/images/projects')
            ->setUploadDir('public/uploads/images/projects')
            ->setUploadedFileNamePattern('[year][month][day]-[slug]-[randomhash].[extension]')
            ->setRequired($pageName === Crud::PAGE_NEW);

        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextField::new('subtitle'),
            DateField::new('year', 'Date de réalisation'),
            TextField::new('link', 'Lien du projet'),
            TextField::new('speciality', 'Spécialité'),
            $pictureField,
            TextEditorField::new('description'),
        ];
    }
}