<?php

namespace App\Controller\Admin;

use App\Entity\Etudiant;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Vich\UploaderBundle\Form\Type\VichImageType;


class EtudiantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Etudiant::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setDateFormat("dd/MM/yyyy");
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('matricule'),
            TextField::new('nom'),
            TextField::new('prenom'),
            TextField::new('sexe'),
            TextField::new('cin'),
            EmailField::new('email'),
            DateField::new('dateNaissance','Date de Naissance')->hideOnIndex(),
            TextField::new('lieuNaissance','Lieu de Naissance')->hideOnIndex(),
            TelephoneField::new('telephone'),
            TextField::new('adresse')->hideOnIndex(),
            ImageField::new('photo', 'Photo')
                ->onlyOnDetail()
                ->setBasePath('/uploads/images'),
 $imageFile =TextareaField::new('imageFile', 'Photo')
                ->onlyOnForms()
                ->setFormType(VichImageType::class),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX,Action::DETAIL);
    }
}
