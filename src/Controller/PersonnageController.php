<?php

namespace App\Controller;

use App\Entity\Personnage;
use App\Entity\Type;
use App\Form\PersonnageType;
use App\Repository\PersonnageRepository;
use App\Repository\TypeRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PersonnageController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(PersonnageRepository $personnageRepository): Response
    {
        return $this->render('personnage/index.html.twig', [
            'personnages' => $personnageRepository->findAll(),
        ]);
    }

    
    #[Route('/personnage/{id}', name: 'voir_personnage', methods: ['GET'])]
    public function show(Personnage $personnage): Response
    {
        return $this->render('personnage/voir.html.twig', [
            'personnage' => $personnage,
        ]);
    }

    /* quand je mets /personnage/ajout ça ne marche pas, je trouve pas pk*/

    #[Route('/ajout', name: 'ajout_personnage', methods: ['GET', 'POST'])]
    public function new(Request $request, PersonnageRepository $personnageRepository): Response
    {
        $personnage = new Personnage();
        $form = $this->createForm(PersonnageType::class, $personnage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $personnageRepository->save($personnage, true);

            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('personnage/ajout.html.twig', [
            'personnage' => $personnage,
            'form' => $form,
        ]);
    }

    #[Route('/personnage/modification/{id}', name: 'modif_personnage', methods: ['GET', 'POST'])]
    public function edit(Request $request, Personnage $personnage, PersonnageRepository $personnageRepository): Response
    {
        $form = $this->createForm(PersonnageType::class, $personnage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $personnageRepository->save($personnage, true);

            return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('personnage/modif.html.twig', [
            'personnage' => $personnage,
            'form' => $form,
        ]);
    }

    #[Route('personnage/suppression/{id}', name: 'suppr_personnage', methods: ['POST'])]
    public function delete(Request $request, Personnage $personnage, PersonnageRepository $personnageRepository): Response
    {
        if ($this->isCsrfTokenValid('supprimer'.$personnage->getId(), $request->request->get('_token'))) {
            $personnageRepository->remove($personnage, true);
        }

        return $this->redirectToRoute('home', [], Response::HTTP_SEE_OTHER);
    }
    
    #[Route('/type', name: 'home_type')]
    public function indextype(TypeRepository $typeRepository): Response
    {
        return $this->render('type/index.html.twig', [
            'types' => $typeRepository->findAll(),
        ]);
    }

    #[Route('/type/{id}', name: 'voir_type', methods: ['GET'])]
    public function showtype(Type $type): Response
    {
        return $this->render('type/voir.html.twig', [
            'type' => $type,
        ]);
    }
}
