<?php

namespace App\Controller;

use App\Entity\Personnage;
use App\Entity\Type;
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

    
    #[Route('personnage/{id}', name: 'voir_personnage', methods: ['GET'])]
    public function show(Personnage $personnage): Response
    {
        return $this->render('personnage/voir.html.twig', [
            'personnage' => $personnage,
        ]);
    }
    
    #[Route('/type', name: 'home_type')]
    public function indextype(TypeRepository $typeRepository): Response
    {
        return $this->render('type/index.html.twig', [
            'types' => $typeRepository->findAll(),
        ]);
    }

    #[Route('type/{id}', name: 'voir_type', methods: ['GET'])]
    public function showtype(Type $type): Response
    {
        return $this->render('type/voir.html.twig', [
            'type' => $type,
        ]);
    }
}
