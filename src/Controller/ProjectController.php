<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProjectsRepository;

final class ProjectController extends AbstractController
{
    #[Route('/project', name: 'app_project')]
    public function index(Request $request, ProjectsRepository $projectsRepository): Response
    {
        $page = max(1, $request->query->getInt('page', 1));
        $limit = 3;

        $projects = $projectsRepository->findProjectsPaginated($page, $limit);
        $totalProjects = $projectsRepository->countProjects();
        $totalPages = (int) ceil($totalProjects / $limit);

        return $this->render('project/index.html.twig', [
            'controller_name' => 'ProjectController',
            'title' => 'Projets - Mon portfolio',
            'projects' => $projects,
            'currentPage' => $page,
            'totalPages' => $totalPages,
        ]);
    }

    /**
     * Ici la route pour accéder a un projet
     */
    #[Route('/project/{slug}', name: 'app_project_show')]
    public function show(string $slug, ProjectsRepository $projectsRepository): Response
    {

        $title = str_replace('-', ' ', $slug);

        $project = $projectsRepository->getProjectByTitle($title);

        if (!$project) {
            throw $this->createNotFoundException('Projet introuvable.');
        }

        return $this->render('project/show.html.twig', [
            'controller_name' => 'ProjectController',
            'title' => 'Détails du projet - Mon portfolio',
            'project' => $project,
        ]);
    }
}
