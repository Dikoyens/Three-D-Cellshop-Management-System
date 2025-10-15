<?php

namespace App\Entity;

use App\Repository\RepairRecordRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: RepairRecordRepository::class)]
class RepairRecord
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $customerName = null;

    #[ORM\Column(length: 11)]
    private ?string $mobileNumber = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $repairDetails = null;

    #[ORM\Column(length: 50)]
    private ?string $paymentMethod = null;

    // #[ORM\Column(length: 255, nullable: true)]
    // private ?string $partUsed = null;

    #[ORM\ManyToOne(inversedBy: 'repairRecords')]
    private ?Category $category = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerName(): ?string
    {
        return $this->customerName;
    }

    public function setCustomerName(string $customerName): static
    {
        $this->customerName = $customerName;

        return $this;
    }

    public function getMobileNumber(): ?string
    {
        return $this->mobileNumber;
    }

    public function setMobileNumber(string $mobileNumber): static
    {
        $this->mobileNumber = $mobileNumber;

        return $this;
    }

    public function getRepairDetails(): ?string
    {
        return $this->repairDetails;
    }

    public function setRepairDetails(string $repairDetails): static
    {
        $this->repairDetails = $repairDetails;

        return $this;
    }

    public function getpaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setpaymentMethod(string $paymentMethod): static
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    // public function getPartUsed(): ?string
    // {
    //     return $this->partUsed;
    // }

    // public function setPartUsed(string $partUsed): static
    // {
    //     $this->partUsed = $partUsed;

    //     return $this;
    // }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): static
    {
        $this->category = $category;

        return $this;
    }
}
