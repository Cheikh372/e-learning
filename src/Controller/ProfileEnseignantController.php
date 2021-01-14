<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileEnseignantController extends AbstractController
{
    
    /**
     * @Route("/profile/enseignant", name ="profile_enseignant")
     */
    public function index(): Response
    {
        return $this->render('profile_enseignant/index.html.twig', [
            'controller_name' => 'ProfileEnseignantController',
        ]);
    }
}
