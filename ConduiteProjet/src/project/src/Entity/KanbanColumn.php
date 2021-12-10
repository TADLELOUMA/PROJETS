<?php

namespace App\Entity;

use App\Repository\KanbanColumnRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KanbanColumnRepository::class)
 */
class KanbanColumn
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
     * @ORM\Column(type="array")
     */
    private $taskList = [];

    /**
     * @ORM\Column(type="array")
     */
    private $orderList = [];

    /**
     * @ORM\Column(type="integer")
     */
    private $nbMaxTasks;

    // public function __construct($title, $nb_max_tasks)
    // {
    //     $this->title = $title;
    //     $this->nbMaxTasks = $nb_max_tasks;
    // }

    public function __construct()
    {
        $this->title = 'title';
        $this->nbMaxTasks = 2;
    }

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

    public function getTaskList(): ?array
    {
        return $this->taskList;
    }

    public function setTaskList(?array $taskList): self
    {
        $this->taskList = $taskList;

        return $this;
    }

    public function getOrderList(): ?array
    {
        return $this->orderList;
    }

    public function setOrderList(?array $orderList): self
    {
        $this->orderList = $orderList;

        return $this;
    }

    public function getNbMaxTasks(): ?int
    {
        return $this->nbMaxTasks;
    }

    public function setNbMaxTasks(int $nbMaxTasks): self
    {
        $this->nbMaxTasks = $nbMaxTasks;

        return $this;
    }
}
