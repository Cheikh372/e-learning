<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileEtudiantController extends AbstractController
{
    /**
     * @Route("/profile/etudiant", name ="profile_etudiant")
     */
    public function index(): Response
    {
        return $this->render('profile_etudiant/index.html.twig', [
            'controller_name' => 'ProfileEtudiantController',
        ]);
    }
}
