<?php

namespace App\Controller\Admin;

use App\Entity\ChallengeCategory;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ChallengeCategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ChallengeCategory::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        $crud->setPageTitle(Crud::PAGE_INDEX, 'Challenge category');
        $crud->setPageTitle(Crud::PAGE_EDIT, 'Edit challenge category');
        return parent::configureCrud($crud); // TODO: Change the autogenerated stub
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
