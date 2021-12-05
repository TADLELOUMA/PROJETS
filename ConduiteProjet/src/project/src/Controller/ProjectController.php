<?php

namespace App\Controller;

use App\Entity\Project;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{

    /**
     * @Route("/project", name="app_project",methods={"GET", "POST"} )
     */
    public function index(EntityManagerInterface $em): Response
    {
        $repo = $em->getRepository(Project::class);
        dd($repo->findAll());
        return $this->render('project/project.html.twig');
    }
}
