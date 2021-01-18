<?php

namespace App\Controller;

use App\Entity\Support;
use App\Form\SupportType;
use App\Entity\Enseignant;
use App\Repository\SupportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/profile/enseignant/support',name: 'support_')]
class SupportController extends AbstractController
{
    /**
    * @Route("/", name ="index")
    */
    public function index(SupportRepository $supportRepository): Response
    {
        return $this->render('support/index.html.twig', [
            'supports' => $supportRepository->findAll(),
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
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(Support $support): Response
    {
        return $this->render('support/show.html.twig', [
            'support' => $support,
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
