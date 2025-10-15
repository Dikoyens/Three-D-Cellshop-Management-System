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
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }

    #[Route('/parts', name: 'app_part_index', methods: ['GET'])]
    public function partIndex(PartRepository $partRepository): Response
    {
        return $this->render('part/index.html.twig', [
            'parts' => $partRepository->findAll(),
        ]);
    }

    #[Route('/repairs', name: 'app_repair_record_index', methods: ['GET'])]
    public function repairRecordIndex(RepairRecordRepository $repairRecordRepository): Response
    {
        return $this->render('repair_record/index.html.twig', [
            'repair_records' => $repairRecordRepository->findAll(),
        ]);
    }

    #[Route('/deliveries', name: 'app_delivery_index', methods: ['GET'])]
    public function deliveryIndex(DeliveryRepository $deliveryRepository): Response
    {
        return $this->render('delivery/index.html.twig', [
            'deliveries' => $deliveryRepository->findAll(),
        ]);
    }

    #[Route('/categories', name: 'app_category_index', methods: ['GET'])]
    public function categoryIndex(CategoryRepository $categoryRepository): Response
    {
        return $this->render('category/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }
}
