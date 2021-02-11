<?php

namespace App\Controller;

use App\Entity\Support;
use App\Form\SupportType;
use App\Entity\Enseignant;
use App\Entity\Matiere;
use App\Repository\EnseignantRepository;
use App\Repository\SupportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/profile/enseignant/support',name: 'support_')]
class SupportController extends AbstractController
{
    private $enseignantRepo;
    
    public function __construct(EnseignantRepository $repo)
    {
        $this->enseignantRepo=$repo;
    }
    /**
    * @Route("/", name ="index")
    */
    public function index(Request $request): Response
    {
        // recupere l'enseignant connecté
        $user =$this->getUser();
        $enseignant =$this->enseignantRepo->find($user->getidUser());

        // on recupere les matieres qu'il enseigne
        $matieres = $enseignant->getMatieres(); 
        $repamat=$this->getDoctrine()->getRepository(Matiere::class);

        if($matieres){
           
            $current_matiere=$matieres[0];
            // recuperation  des depots
            $current_support=$matieres[0]->getSupports();

            if($request->query->has('id')){
                $idmat =$request->query->get('id') ;
                $current_matiere =$repamat->find($idmat);
                $current_support =$current_matiere->getSupports();
            }
        }
        return $this->render('support/index.html.twig', [
            'current_support'=>$current_support,
            'current_menu'=>'support',
            'current_matiere'=>$current_matiere->getLibelle(),
            'matieres'=>$matieres,
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $support = new Support();
        $form = $this->createForm(SupportType::class, $support);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            //on recupere le fichier
            $pdf=$form->get('fichierpdf')->getData();
            $fichier =md5(uniqid()).'.'.$pdf->guessExtension();
            $pdf->move($this->getParameter('pdf_directory'),$fichier);
            $support->setNomfichier($fichier);
            // on recupere l'enseignant
            $user =$this->getUser();
            $enseignant =$this->getDoctrine()
                            ->getRepository(Enseignant::class)
                            ->find($user->getidUser());
            $support->setEnseignant($enseignant);

            $entityManager->persist($support);
            $entityManager->flush();

            return $this->redirectToRoute('support_index');
        }

        return $this->render('support/new.html.twig', [
            'support' => $support,
            'form' => $form->createView(),
            'current_menu'=>'support',
            'current_matiere'=>'nnnn',
            'matieres'=>[],
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Support $support): Response
    {
        return $this->render('support/show.html.twig', [
            'support' => $support,
            'current_menu'=>'support',
            'current_matiere'=>'nnnn',
            'matieres'=>[],
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Support $support): Response
    {
        $form = $this->createForm(SupportType::class, $support);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('support_index');
        }

        return $this->render('support/edit.html.twig', [
            'support' => $support,
            'form' => $form->createView(),
            'current_menu'=>'support',
            'current_matiere'=>'nnnn',
            'matieres'=>[],
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['DELETE'])]
    public function delete(Request $request, Support $support): Response
    {
        if ($this->isCsrfTokenValid('delete'.$support->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($support);
            $entityManager->flush();
        }

        return $this->redirectToRoute('support_index');
    }
}
