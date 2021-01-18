<?php

namespace App\Controller;

use App\Entity\Enseignant;
use App\Entity\DepotTravaux;
use App\Form\DepotTravauxType;
use App\Repository\DepotTravauxRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/profile/enseignant/depot',name: 'depot')]
class DepotTravauxController extends AbstractController
{
    #[Route('/', name: '_index', methods: ['GET'])]
    public function index(DepotTravauxRepository $depotTravauxRepository): Response
    {
        return $this->render('depot_travaux/index.html.twig', [
            'depot_travauxes' => $depotTravauxRepository->findAll(),
            'current_menu'=>'depot',
        ]);
    }

    #[Route('/new', name: '_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $depotTravaux = new DepotTravaux();
        $form = $this->createForm(DepotTravauxType::class, $depotTravaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            // recupere le fichier si ca existe
            $pdf=$form->get('fichierpdf')->getData();
            if($pdf){
                $fichier =md5(uniqid()).'.'.$pdf->guessExtension();
                $pdf->move($this->getParameter('pdf_directory'),$fichier);
                $depotTravaux->setFichier($fichier);
            }     
            // on recupere l'enseignant
            $user =$this->getUser();
            $enseignant =$this->getDoctrine()
                            ->getRepository(Enseignant::class)
                            ->find($user->getidUser());
            $depotTravaux->setEnseignant($enseignant);
            // on met a jour le date de Creation
    
            $entityManager->persist($depotTravaux);
            $entityManager->flush();

            return $this->redirectToRoute('depot_index');
        }

        return $this->render('depot_travaux/new.html.twig', [
            'depot_travaux' => $depotTravaux,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: '_show', methods: ['GET'])]
    public function show(DepotTravaux $depotTravaux): Response
    {
        return $this->render('depot_travaux/show.html.twig', [
            'depot_travaux' => $depotTravaux,
        ]);
    }

    #[Route('/{id}/edit', name: '_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, DepotTravaux $depotTravaux): Response
    {
        $form = $this->createForm(DepotTravauxType::class, $depotTravaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('depot_index');
        }

        return $this->render('depot_travaux/edit.html.twig', [
            'depot_travaux' => $depotTravaux,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: '_delete', methods: ['DELETE'])]
    public function delete(Request $request, DepotTravaux $depotTravaux): Response
    {
        if ($this->isCsrfTokenValid('delete'.$depotTravaux->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($depotTravaux);
            $entityManager->flush();
        }

        return $this->redirectToRoute('depot_index');
    }
}
