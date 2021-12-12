<?php

namespace App\Controller;

use App\Entity\KanbanColumn;
use App\Entity\Project;
use App\Entity\Sprint;
use App\Entity\Task;
use App\Repository\ProjectRepository;
use App\Repository\SprintRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProjectCreateType;
use App\Form\TaskCreateType;
use ArrayObject;
use DateTime;
use phpDocumentor\Reflection\Types\Array_;

class ProjectController extends AbstractController
{

    /**
     * @Route("/project", name="app_project",methods={"GET", "POST"} )
     */
    public function index(ProjectRepository $repoProject, SprintRepository $repoSprint): Response
    {
        return $this->render('project/project.html.twig', ['projects' => $repoProject->findAll()]);
    }
    /**
     * @Route("/createProject", name="app_createProject",methods={"GET", "POST"} )
     */
    public function createProject(Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ProjectCreateType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $project = $form->getData();
            $em->persist($project);
            $em->flush();
            $this->addFlash('success', 'User successfully created');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('project/createProject.html.twig', ['createProjectForm' => $form->createView()]);
    }
    /**
     * @Route("/openedProject/{projectId}", name="app_openedProject",methods={"GET", "POST"} )
     */
    public function openProject($projectId, Request $request): Response
    {
        $repository = $this->getDoctrine()->getRepository(Project::class);
        $project = $repository->findOneBy(['id' => $projectId]);


        return $this->render('project/openedProject.html.twig', ['project' => $project]);
    }


    /**
     * @Route("/sprint_create/{projectId}", name="app_sprint_create",methods={"GET", "POST"} )
     */
    public function createTab($projectId, Request $request, EntityManagerInterface $em): Response
    {

        $repository = $this->getDoctrine()->getRepository(Project::class);
        //Faire un try catch au cas où project est nul
        $project = $product = $repository->findOneBy(['id' => $projectId]);

        $sprint = $this->createSprint($em);
        $project->addSprint($sprint);

        $em->persist($project);

        $em->flush();

        $message = 'Pop up Test';
        $popup = $this->createTask($request, $em);

        echo '<script type="text/javascript">window.alert("' . $message . '");</script>';


        return $this->render('project/openedProject.html.twig', ['project' => $project]);
    }

    //     public function popup()
    //     {


    // // Admin recipient email id
    // $toEmail = 'demo@example.com';

    // $status = 0;
    // $statusMsg = 'Oops! Something went wrong! Please try again late.';
    // if(isset($_POST['contact_submit'])){
    //     // Get the submitted form data
    //     $email = $_POST['email'];
    //     $name = $_POST['name'];
    //     $message = $_POST['message'];

    //     // Check whether submitted data is not empty
    //     if(!empty($email) && !empty($name) && !empty($message)){

    //         if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
    //             $statusMsg = 'Please enter a valid email.';
    //         }else{
    //             $emailSubject = 'Contact Request Submitted by '.$name;
    //             $htmlContent = 'Contact Request Submitted
    //                 Name'.$name.'
    //                 Email'.$email.'
    //                 Message'.$message.'';

    //             // Set content-type header for sending HTML email
    //             $headers = "MIME-Version: 1.0" . "\r\n";
    //             $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    //             // Additional headers
    //             $headers .= 'From: '.$name.'<'.$email.'>'. "\r\n";

    //             // Send email
    //             $sendEmail = mail($toEmail, $emailSubject, $htmlContent, $headers);
    //             if($sendEmail){
    //                 $status = 1;
    //                 $statusMsg = 'Thanks! Your contact request has been submitted successfully.';
    //             }else{
    //                 $statusMsg = 'Failed! Your contact request submission failed, please try again.';
    //             }
    //         }
    //     }else{
    //         $statusMsg = 'Please fill in all the mandatory fields.';
    //     }
    // 

    // $response = array(
    //     'status' => $status,
    //     'message' => $statusMsg
    // );
    // echo json_encode($response);



    // public function createForm(Request $request, EntityManagerInterface $em): Response
    // {
    //     $form = $this->createForm(TaskCreateType::class);
    //     $form->handleRequest($request);
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $project = $form->getData();
    //         $em->persist($project);
    //         $em->flush();
    //         $this->addFlash('success', 'Info successfully created');
    //     }
    //     return $this->render('task.html.twig');
    // }
    public function createColumn(EntityManagerInterface $em, $title, $nb_max_tasks): KanbanColumn
    {
        $column = new KanbanColumn($title, $nb_max_tasks);

        $em->persist($column);

        $em->flush();

        return $column;
    }
    public function createSprint(EntityManagerInterface $em): Sprint
    {
        $sprint = new Sprint;


        $column =  $this->createColumn($em, "new Column", 2);
        $column->setTitle("titre");

        $sprint->addColumn($column);
        $em->persist($sprint);

        $em->flush();

        return $sprint;
    }

    /**
     * @Route("/createTask", name="app_createTask",methods={"GET", "POST"} )
     */
    public function createTask(Request $request, EntityManagerInterface $em): Response
    {
        $task = new Task();
        $form = $this->createForm(TaskCreateType::class, $task);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $users = $form->get('assignation')->getData();
            $userTab[] = new ArrayObject();
            foreach ($users as $user) {
                $userTab[] = $user->getUsername();
            }

            $task->setAssignation($userTab);
            $em->persist($form->getData());
            $em->flush();
            $this->addFlash('success', 'Task successfully created');
        }


        return $this->render('task.html.twig', ['createTaskForm' => $form->createView()]);
    }
}
