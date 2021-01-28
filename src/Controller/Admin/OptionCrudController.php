<?php

namespace App\Controller\Admin;

use App\Entity\Option;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OptionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Option::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('cigle'),
            TextField::new('libelle'),
            AssociationField::new('parcours'),    
        ];
    }
    
}
