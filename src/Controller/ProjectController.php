<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProjectsRepository;

final class ProjectController extends AbstractController
{
    #[Route('/project', name: 'app_project')]
    public function index(ProjectsRepository $projectsRepository): Response
    {
        $projects = $projectsRepository->getAllProjects();

        return $this->render('project/index.html.twig', [
            'controller_name' => 'ProjectController',
            'title' => 'Projets - Mon portfolio',
            'projects' => $projects
        ]);
    }

    #[Route('/project/{slug}', name: 'app_project_show')]
    public function show(string $slug): Response
    {
        return $this->render('project/show.html.twig', [
            'controller_name' => 'ProjectController',
            'slug' => $slug,
            'title' => 'Détails du projet - Mon portfolio'
        ]);
    }
}
