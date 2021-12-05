<?php

namespace App\Controller;

use App\Repository\SprintRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KanbanController extends AbstractController
{
    /**
     * @Route("/kanban", name="app_kanban",methods={"GET", "POST"} )
     */
    public function index(SprintRepository $sprintRepository): Response
    {
        $kanbanColumns = $sprintRepository->findAll();
        dd($kanbanColumns);
        return $this->render('kanban/kanban.html.twig', compact('kanbanColumns'));
    }
    /**
     * @Route("/kanban", name="app_kanban",methods={"GET", "POST"} )
     */

    public function createTab(Request $request, EntityManagerInterface $em): Response
    {

        return $this->render('security/register.html.twig', ['registrationForm' => $form->createView()]);
    }
}
