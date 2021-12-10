<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\SprintRepository;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * @ORM\Entity(repositoryClass=SprintRepository::class)
 */
class Sprint
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $CreationDate;

    /**
     * @ORM\Column(type="date")
     */
    private $endingDate;

    /**
     * @ORM\Column(type="array")
     */
    private $tasksList = [];

    /**
     * @ORM\Column(type="array")
     */
    private $kanbanTab = [];

    /**
     * @ORM\Column(type="array")
     */
    private $dailyAndRestrospectivePlanning = [];

    public function __construct()
    {
        $this->CreationDate = new DateTime();
        $this->endingDate = new DateTime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->CreationDate;
    }

    public function setCreationDate(\DateTimeInterface $CreationDate): self
    {
        $this->CreationDate = $CreationDate;

        return $this;
    }

    public function getEndingDate(): ?\DateTimeInterface
    {
        return $this->endingDate;
    }

    public function setEndingDate(\DateTimeInterface $endingDate): self
    {
        $this->endingDate = $endingDate;

        return $this;
    }

    public function getTasksList(): ?array
    {
        return $this->tasksList;
    }

    public function setTasksList(array $tasksList): self
    {
        $this->tasksList = $tasksList;

        return $this;
    }

    public function getKanbanTab(): ?array
    {
        return $this->kanbanTab;
    }

    public function setKanbanTab(array $kanbanTab): self
    {
        $this->kanbanTab = $kanbanTab;

        return $this;
    }

    public function getDailyAndRestrospectivePlanning(): ?array
    {
        return $this->dailyAndRestrospectivePlanning;
    }

    public function setDailyAndRestrospectivePlanning(array $dailyAndRestrospectivePlanning): self
    {
        $this->dailyAndRestrospectivePlanning = $dailyAndRestrospectivePlanning;

        return $this;
    }

    public function addColumn(KanbanColumn $column): self
    {
        // if ($this->kanbanTab == null) {
        //     $this->kanbanTab = array();
        // }
        array_push($this->kanbanTab, $column->getId());
        return $this;
    }
}
