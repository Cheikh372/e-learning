<?php

namespace App\Controller\Admin;

use App\Entity\Matiere;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MatiereCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Matiere::class;
    }

 
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('idMatiere','Code Matiere'),
            TextField::new('libelle'),
            NumberField::new('coefficient'),
            NumberField::new('volhcm','CM'),
            NumberField::new('volhtd','TD'),
            NumberField::new('volhtp','TP'),
            AssociationField::new('id_ue',"UE"),
            AssociationField::new('Enseignant'),
        ];
    }
   
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX,Action::DETAIL);
    }
}
