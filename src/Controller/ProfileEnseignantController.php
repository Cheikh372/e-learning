<?php

namespace App\Controller;

use App\Repository\EnseignantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/profile/enseignant", name ="enseignant_")
*/
class ProfileEnseignantController extends AbstractController
{
    
    private $enseignantRepo;

    public function __construct(EnseignantRepository $repo){
        $this->enseignantRepo=$repo;
    }

    /**
     * @Route("/", name ="profile")
     */
    public function home(): Response
    {
        /*
            recuperer les informations personnelles de l'etudiant et
            le passer au controller ,ses absences
        */
        $user =$this->getUser();
        $enseignant =$this->enseignantRepo->find($user->getidUser());
        return $this->render('profile_enseignant/index.html.twig', [
            'enseignant' => $enseignant,
        ]);
    }

    /**
    * @Route("/planning", name ="planning")
    */
    public function planning(): Response
    {
       return $this->render('profile_enseignant/planning.html.twig');
    }
    /**
    * retourne tous les support
    * @Route("/depot", name ="depot")
    */
    public function depot(): Response
    {
        return $this->render('profile_enseignant/depot.html.twig');
    }

    /**
    * retourne tous la discussion pour une matiere (concernant enseignant )
    * @Route("/discussion", name ="discussion")
    */
    public function Discussion(): Response
    {
        return $this->render('profile_etudiant/discussion.html.twig');
    }

}
