<?php

namespace App\Controller\Admin;

use App\Entity\Inscrire;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class InscrireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Inscrire::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDateFormat("dd/MM/yyyy")
            ->setEntityLabelInPlural("Inscriptions")
            ->setEntityLabelInSingular("Inscription")

            ->setPageTitle("index", "Liste des %entity_label_plural%")
            ->setPageTitle("new","Ajouter une %entity_label_singular%")
            ->setPageTitle("edit","Modifier l' %entity_label_singular% ");
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX,Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setLabel('Ajouter une %entity_label_singular%');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setLabel('Modifier');
            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setLabel('Supprimer');
            })
            ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
                return $action->setLabel('Afficher');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Ajouter');
            })
            ->update(Crud::PAGE_NEW, Action::SAVE_AND_ADD_ANOTHER, function (Action $action) {
                return $action->setLabel('Créer et ajouter un autre %entity_label_singular%');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_RETURN, function (Action $action) {
                return $action->setLabel('Sauvegarder les changements');
            })
            ->update(Crud::PAGE_EDIT, Action::SAVE_AND_CONTINUE, function (Action $action) {
                return $action->setLabel('Sauvegarder et continuer à modifier');
            })
            ->update(Crud::PAGE_DETAIL, Action::DELETE, function (Action $action) {
                return $action->setLabel('Supprimer');
            })
            ->update(Crud::PAGE_DETAIL, Action::INDEX, function (Action $action) {
                return $action->setLabel('Retour à la liste');
            })
            ->update(Crud::PAGE_DETAIL, Action::EDIT, function (Action $action) {
                return $action->setLabel('Modifier');
            })
            ;
    }
   
    public function configureFields(string $pageName): iterable
    {
        return [
            FormField::addPanel(),
            AssociationField::new('etudiant'),
            AssociationField::new('matiere'),
            TextField::new('semestre'),
            DateField::new('date_inscription'),
        ];
    }
    
}
