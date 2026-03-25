<?php

namespace App\Controller\Admin;

use App\Entity\Achievements;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AchievementsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Achievements::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $pictureField = ImageField::new('picture', 'Image')
            ->setBasePath('uploads/images/achievements')
            ->setUploadDir('public/uploads/images/achievements')
            ->setUploadedFileNamePattern('[year][month][day]-[slug]-[randomhash].[extension]')
            ->setRequired($pageName === Crud::PAGE_NEW);

        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('description'),
            $pictureField,
            AssociationField::new('skill', 'Catégorie')
                ->setFormTypeOption('choice_label', 'title'),
        ];
    }
}