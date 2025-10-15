<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, RepairRecord>
     */
    #[ORM\OneToMany(targetEntity: RepairRecord::class, mappedBy: 'category')]
    private Collection $repairRecords;

    public function __construct()
    {
        $this->repairRecords = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, RepairRecord>
     */
    public function getRepairRecords(): Collection
    {
        return $this->repairRecords;
    }

    public function addRepairRecord(RepairRecord $repairRecord): static
    {
        if (!$this->repairRecords->contains($repairRecord)) {
            $this->repairRecords->add($repairRecord);
            $repairRecord->setCategory($this);
        }

        return $this;
    }

    public function removeRepairRecord(RepairRecord $repairRecord): static
    {
        if ($this->repairRecords->removeElement($repairRecord)) {
            // set the owning side to null (unless already changed)
            if ($repairRecord->getCategory() === $this) {
                $repairRecord->setCategory(null);
            }
        }

        return $this;
    }
     public function __toString(): string
    {
        return $this->name ?? '';
    }
}
