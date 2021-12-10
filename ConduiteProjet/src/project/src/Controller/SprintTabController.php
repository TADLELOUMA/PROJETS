<?php

namespace App\Controller;

use App\Entity\Sprint;
use ArrayObject;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SprintTabController extends AbstractController
{
    /**
     * @Route("/sprint", name="app_sprint_tab",methods={"GET", "POST"} )
     */
    public function index(): Response
    {

        // $sprintRepository = $this->getDoctrine()->getRepository(Sprint::class);
        // $sprint  = $sprintRepository->findOneBy(['id' => $sprintId]);

        // if (!$sprint) {
        //     throw $this->createNotFoundException(
        //         'No product found for id ' . $sprintId
        //     );
        // }

        // $taskArray = array();


        // $taskRepository = $this->getDoctrine()->getRepository(Task::class);

        // //On récupère une par une les tâches afin de les envoyer au twig 
        // foreach ($sprint->getTasksList() as $key => $taskId) {
        //     $task =  $taskRepository->findOneBy(['id' => $taskId]);

        //     array_push($taskArray, $task);
        // }


        return $this->render('sprint_tab/index.html.twig');
    }
    /**
     * @Route("/kanbanTab/{sprintId}", name="app_view_tab",methods={"GET", "POST"} )
     */
    public function viewKanbanTab($sprintId): Response
    {
        $repo = $this->getDoctrine()->getRepository(Sprint::class);
        $sprints = ($repo->findAll());
        $taskId[] = new ArrayObject();
        $kanbanTab[] = new ArrayObject();
        foreach ($sprints as $sprint) {
            $taskId[] = $sprint->getTasksList();
            $kanbanTab[] = $sprint->getKanbanTab();
        }
        dd($kanbanTab);
        return $this->render('sprint_tab/kanbanTab.html.twig', ['taskTabs' => $taskId, 'kanbanTabs' => $kanbanTab]);
    }
}
