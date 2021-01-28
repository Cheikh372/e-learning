<?php

namespace App\Controller\Admin;

use App\Entity\Enseignant;
use App\Entity\Etudiant;
use App\Entity\Inscrire;
use App\Entity\Matiere;
use App\Entity\Option;
use App\Entity\Parcours;
use App\Entity\Salle;
use App\Entity\UniteEnseignement;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin_profile")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(EtudiantCrudController::class)->generateUrl());


    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('E Learning');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linktoDashboard('Administrateur', 'fa fa-home'),
            MenuItem::subMenu('Gestion Utilisateur','fa fa-tags')
                ->setSubItems([
                    MenuItem::linkToCrud('Etudiant','fa fa-tags',Etudiant::class),
                    MenuItem::linkToCrud('Enseignant','fa fa-tags',Enseignant::class),
                ]),
            MenuItem::subMenu('Gestion Emploi du Temps','fa fa-tags')
                ->setSubItems([
                    MenuItem::linkToCrud('Matiere','fa fa-tags',Matiere::class),
                    MenuItem::linkToCrud('Inscription','fa fa-tags',Inscrire::class),
                    MenuItem::linkToCrud("Unite d'Enseignement",'fa fa-tags',UniteEnseignement::class),
                    MenuItem::linkToCrud("Salle",'fa fa-tags',Salle::class),
                    MenuItem::linkToCrud("Options",'fa fa-tags',Option::class),
                    MenuItem::linkToCrud("Parcours",'fa fa-tags',Parcours::class)
                ]),
            MenuItem::subMenu('Gestion Notes','fa fa-tags')
            ->setSubItems([
               
            ]),


            ];
    }  
}
