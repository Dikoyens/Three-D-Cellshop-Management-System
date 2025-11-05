<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\PartRepository;
use App\Repository\RepairRecordRepository;
use App\Repository\DeliveryRepository;
use App\Repository\CategoryRepository;

final class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard_index', methods: ['GET'])]
    public function dashboardIndex(
        PartRepository $partRepository,
        RepairRecordRepository $repairRecordRepository,
        DeliveryRepository $deliveryRepository,
        CategoryRepository $categoryRepository
    ): Response {

        // ✅ Check if user is logged in
        if (!$this->getUser()) {
            // Show custom Access Denied page
            return new Response(
                'Access Denied: you must be logged in to access this area.',
                Response::HTTP_FORBIDDEN
            );
        }
         return new Response('Welcome to the dashboard! (Protected Area)');
         
        // ✅ Dashboard data counts
        $partsCount = $partRepository->count([]);
        $categoriesCount = $categoryRepository->count([]);
        $deliveriesCount = $deliveryRepository->count([]);
        $repairsCount = $repairRecordRepository->count([]);

        // ✅ Example recent activity
        $recentActivity = [
            [
                'date' => new \DateTime('-1 day'),
                'action' => 'Added new part',
                'entity' => 'Part',
                'user' => 'Admin',
            ],
            [
                'date' => new \DateTime('-2 days'),
                'action' => 'Updated repair record',
                'entity' => 'Repair',
                'user' => 'Admin',
            ],
        ];

        return $this->render('dashboard/index.html.twig', [
            'parts_count' => $partsCount,
            'categories_count' => $categoriesCount,
            'deliveries_count' => $deliveriesCount,
            'repairs_count' => $repairsCount,
            'recent_activity' => $recentActivity,
        ]);
    }
}
