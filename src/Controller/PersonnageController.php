<?php

namespace App\Controller;

use App\Entity\Personnage;
use App\Form\PersonnageType;
use App\Repository\PersonnageRepository;
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
}
