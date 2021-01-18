<?php

namespace App\Controller;


use App\Repository\EtudiantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileEtudiantController extends AbstractController
{   
    private $etudiantRepo;
    
    public function __construct(EtudiantRepository $repo){
        $this->etudiantRepo=$repo;
    }
    /**
     * @Route("/profile/etudiant", name ="profile_etudiant")
    */
    public function home(): Response
    {   /*
            recuperer les informations personnelles de l'etudiant et
            le passer au controller ,ses absences
        */
        $user =$this->getUser();
        $etudiant =$this->etudiantRepo->find($user->getidUser());
        return $this->render('profile_etudiant/index.html.twig', [
            'etudiant' => $etudiant,
        ]);
    }
    
    /**
     * @Route("/profile/etudiant/planning", name ="etudiant_planning")
    */
    public function planning(): Response
    {

        return $this->render('profile_etudiant/planning.html.twig');
    }

    /**
     * retourne tous les support
     * @Route("/profile/etudiant/support", name ="etudiant_support")
    */
    public function support(): Response
    {
        return $this->render('profile_etudiant/support.html.twig');
    }

    /**
     * retourne tous les support pour une matiere et enseignant
     * @Route("/profile/etudiant/support", name ="etudiant_support_matiere")
    */
    public function supportMatiere() :Response
    {
        return new Response('tous les supports d une matiere donnee');
    }

    /**
     * retourne tous la discussion pour une matiere (inscrit par l'etudiant) et enseignant
     * @Route("/profile/etudiant/discussion", name ="etudiant_discussion")
    */
    public function Discussion(): Response
    {
        return $this->render('profile_etudiant/discussion.html.twig');
    }

    /**
     * retourne tous la discussion pour une matiere (inscrit par l'etudiant) et enseignant
     * @Route("/profile/etudiant/discussion", name ="etudiant_discussion_matiere")
    */
    public function discussionMatiere(){
        return new Response('tous les discussion sur une matiere donnee');
    }

}
