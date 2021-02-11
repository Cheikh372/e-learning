<?php

namespace App\Controller;

use App\Entity\Matiere;
use App\Entity\Inscrire;
use App\Entity\Support;
use App\Repository\EtudiantRepository;
use Symfony\Component\HttpFoundation\Request;
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
    public function support(Request $request): Response
    {
        $user =$this->getUser();
        $etudiant =$this->etudiantRepo->find($user->getidUser());
        $matiereid = $etudiant->getMatiere(); // ligne inscrire
        $repamat=$this->getDoctrine()->getRepository(Matiere::class);

        if($matiereid){
            foreach($matiereid as $id){
                $idmatiere =$id->getMatiere(); // une matiere
                $matieres []= $repamat->find($idmatiere);
            }
            $current_matiere=$matieres[0];
            // recuperation  des depots
            $current_support=$matieres[0]->getSupports();

            if($request->query->has('id')){
                $idmat =$request->query->get('id') ;
                $current_matiere =$repamat->find($idmat);
                $current_support =$current_matiere->getSupports();
            }
        }
        return $this->render('profile_etudiant/support.html.twig',[
            'current_menu'=>'support',
            'matieres'=>$matieres,
            'current_matiere'=>$current_matiere->getLibelle(),
            'current_support'=>$current_support,
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
     * retourne tous les depots pour une matiere et enseignant 
     * @Route("/profile/etudiant/depot", name ="etudiant_depot" )
    */
    public function depot(Request $request): Response
    {
        $user =$this->getUser();
        $etudiant =$this->etudiantRepo->find($user->getidUser());
        $matiereid = $etudiant->getMatiere(); // ligne inscrire
        $repamat=$this->getDoctrine()->getRepository(Matiere::class);
        
        // recuperation des matieres
        if($matiereid){
            foreach($matiereid as $id){
                $idmatiere =$id->getMatiere(); // une matiere
                $matieres []= $repamat->find($idmatiere);
            }
            $current_matiere=$matieres[0];
            // recuperation  des depots
            $current_depot=$matieres[0]->getDepotTravaux();

            if($request->query->has('id')){
                $idmat =$request->query->get('id') ;
                $current_matiere =$repamat->find($idmat);
                $current_depot =$current_matiere->getDepotTravaux();
            }
        }
       
       return $this->render('profile_etudiant/depot.html.twig',[
            'current_menu'=>'depot',
            'matieres'=>$matieres,
            'current_matiere'=>$current_matiere->getLibelle(),
            'current_depot'=>$current_depot,
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
