<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="date")
     */
    private $creationDate;

    /**
     * @ORM\Column(type="array")
     */
    private $sprintsList = [];

    /**
     * @ORM\Column(type="array")
     */
    private $usersList = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $backlogProduct;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $SprintsLog;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getSprintsList(): ?array
    {
        return $this->sprintsList;
    }

    public function setSprintsList(array $sprintsList): self
    {
        $this->sprintsList = $sprintsList;

        return $this;
    }

    public function getUsersList(): ?array
    {
        return $this->usersList;
    }

    public function setUsersList(array $usersList): self
    {
        $this->usersList = $usersList;

        return $this;
    }

    public function getBacklogProduct(): ?string
    {
        return $this->backlogProduct;
    }

    public function setBacklogProduct(string $backlogProduct): self
    {
        $this->backlogProduct = $backlogProduct;

        return $this;
    }

    public function getSprintsLog(): ?string
    {
        return $this->SprintsLog;
    }

    public function setSprintsLog(string $SprintsLog): self
    {
        $this->SprintsLog = $SprintsLog;

        return $this;
    }
}
