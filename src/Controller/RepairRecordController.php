<?php

namespace App\Controller;

use App\Entity\RepairRecord;
use App\Form\RepairRecordType;
use App\Repository\RepairRecordRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/repair/record')]
final class RepairRecordController extends AbstractController
{
    #[Route(name: 'app_repair_record_index', methods: ['GET'])]
    public function index(RepairRecordRepository $repairRecordRepository): Response
    {
        return $this->render('repair_record/index.html.twig', [
            'repair_records' => $repairRecordRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_repair_record_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $repairRecord = new RepairRecord();
        $form = $this->createForm(RepairRecordType::class, $repairRecord);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($repairRecord);
            $entityManager->flush();

            return $this->redirectToRoute('app_repair_record_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('repair_record/new.html.twig', [
            'repair_record' => $repairRecord,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_repair_record_show', methods: ['GET'])]
    public function show(RepairRecord $repairRecord): Response
    {
        return $this->render('repair_record/show.html.twig', [
            'repair_record' => $repairRecord,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_repair_record_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, RepairRecord $repairRecord, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RepairRecordType::class, $repairRecord);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_repair_record_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('repair_record/edit.html.twig', [
            'repair_record' => $repairRecord,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_repair_record_delete', methods: ['POST'])]
    public function delete(Request $request, RepairRecord $repairRecord, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$repairRecord->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($repairRecord);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_repair_record_index', [], Response::HTTP_SEE_OTHER);
    }
}
