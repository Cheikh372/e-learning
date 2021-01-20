<?php

namespace App\Controller\Admin;

use App\Entity\UniteEnseignement;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UniteEnseignementCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UniteEnseignement::class;
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
