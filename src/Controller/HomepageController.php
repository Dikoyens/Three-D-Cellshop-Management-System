<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomepageController extends AbstractController
{
    #[Route('/homepage', name: 'app_homepage')]
    public function index(): Response
    {
        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }
    #[Route('/about', name: 'about')]
    public function about(): Response
    {
        return $this->render('homepage/about.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }
    #[Route('/contact', name: 'contact')]
    public function contact(): Response
    {
        return $this->render('homepage/contact.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }
    #[Route('/services', name: 'services')]
    public function services(): Response
    {
        return $this->render('homepage/services.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }
     #[Route('/bookarepair', name: 'bookarepair')]
    public function bookarepair(): Response
    {
        return $this->render('homepage/bookarepair.html.twig', [
            'controller_name' => 'HomepageController',
        ]);
    }
    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(): Response
    {
        return $this->render('homepage/dashboard.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}
