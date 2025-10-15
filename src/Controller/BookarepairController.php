<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BookarepairController extends AbstractController
{
    #[Route('/bookarepair', name: 'bookarepair')]
    public function index(): Response
    {
        return $this->render('bookarepair/index.html.twig', [
            'controller_name' => 'BookarepairController',
        ]);
    }
}
