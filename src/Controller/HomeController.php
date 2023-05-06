<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(): Response
    {
        return $this->render('home/index_vi.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/inscription', name: 'app_inscription')]
    public function inscrire(): Response
    {
        return $this->render('home/inscription.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/publier', name: 'app_publier')]
    public function publier(): Response
    {
        return $this->render('home/publier.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/postuler', name: 'app_postuler')]
    public function postuler(): Response
    {
        return $this->render('home/candidature.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    #[Route('/entretien', name: 'app_entretien')]
    public function entretien(): Response
    {
        return $this->render('home/entretien.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
