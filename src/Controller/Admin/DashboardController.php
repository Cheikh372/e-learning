<?php

namespace App\Controller\Admin;

use App\Entity\Enseignant;
use App\Entity\Etudiant;
use App\Entity\Matiere;
use App\Entity\UniteEnseignement;
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
        yield MenuItem::linktoDashboard('Administrateur', 'fa fa-home');
        yield MenuItem::section('Gestion Utilisateur');
        yield MenuItem::linkToCrud('Etudiant','fa fa-tags',Etudiant::class);
        yield MenuItem::linkToCrud('Enseignant','fa fa-tags',Enseignant::class);
        yield MenuItem::section("Gestion Emploi du Temps");
        yield MenuItem::linkToCrud('Matiere','fa fa-tags',Matiere::class);
        yield MenuItem::linkToCrud("Unite d'Enseignement",'fa fa-tags',UniteEnseignement::class);
        yield MenuItem::section('Gestion Des Notes');
        

        
    }
}
