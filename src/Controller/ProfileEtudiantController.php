<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Entity\Inscrire;
use App\Entity\Support;
use App\Repository\EtudiantRepository;
use App\Repository\MatiereRepository;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @Route("/profile/etudiant", name ="etudiant_profile")
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
            'current_menu'=>'home',
        ]);
    }
    
    /**
     * @Route("/profile/etudiant/planning", name ="etudiant_planning")
    */
    public function planning(): Response
    {
        
        return $this->render('profile_etudiant/planning.html.twig',[
            'current_menu'=>'planning'
        ]);
    }

    /**
     * retourne tous les support
     * @Route("/profile/etudiant/support", name ="etudiant_support")
    */
    public function support(): Response
    {
        $user =$this->getUser();
        $etudiant =$this->etudiantRepo->find($user->getidUser());
        $matiereid = $etudiant->getMatiere(); // ligne inscrire
        
        foreach($matiereid as $id){
            $idmatiere =$id->getMatiere(); // une matiere
            $matieres []= $this->getDoctrine()->getRepository(Matiere::class)->find($idmatiere);
        }
       
        return $this->render('profile_etudiant/support.html.twig',[
            'current_menu'=>'support',
            'matieres'=>$matieres,
        ]);
    }

    /**
     * retourne tous les support pour une matiere et enseignant
     * 
     * @Route("/profile/etudiant/support/{id}", name ="etudiant_support_matiere" )
    */
    public function supportMatiere($id) :Response
    {
        
        $support[] =$this->getDoctrine()->getRepository(Support::class)->find($id);
        return $this->render('profile_etudiant/support.html.twig',[
            'current_submenu'=>'support',
            'current_matiere'=>'matiere'.$id
        ]);
    }

    /**
     * retourne tous la discussion pour une matiere (inscrit par l'etudiant) et enseignant
     * @Route("/profile/etudiant/discussion", name ="etudiant_discussion")
    */
    public function Discussion(): Response
    {
        return $this->render('profile_etudiant/discussion.html.twig',[
            'current_menu'=>'discussion',
        ]);
    }

    /**
     * retourne tous la discussion pour une matiere (inscrit par l'etudiant) et enseignant
     * @Route("/profile/etudiant/discussion", name ="etudiant_discussion_matiere")
    */
    public function discussionMatiere(){
        return new Response('tous les discussion sur une matiere donnee');
    }

}
