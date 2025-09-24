<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    #[Route('/orders', name: 'app_orders')]
    public function orders(): Response
    {
        return $this->render('dashboard/orders.html.twig', [
            'controller_name' => 'Orders',
        ]);
    }

    #[Route('/customers', name: 'app_customers')]
    public function customers(): Response
    {
        return $this->render('dashboard/customers.html.twig', [
            'controller_name' => 'Customers',
        ]);
    }

    #[Route('/reports', name: 'app_reports')]
    public function reports(): Response
    {
        return $this->render('dashboard/reports.html.twig', [
            'controller_name' => 'Reports',
        ]);
    }

    #[Route('/settings', name: 'app_settings')]
    public function settings(): Response
    {
        return $this->render('dashboard/settings.html.twig', [
            'controller_name' => 'Settings',
        ]);
    }
}
