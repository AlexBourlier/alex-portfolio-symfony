<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SkillsCategoryRepository;
use App\Repository\ExperiencesRepository;

final class AboutController extends AbstractController
{
    #[Route('/about', name: 'app_about')]
    public function index(SkillsCategoryRepository $skillsCategoryRepository, ExperiencesRepository $experiencesRepository): Response
    {
        $categories = $skillsCategoryRepository->findAllCategoriesWithSkills();
        $experiences = $experiencesRepository->findAllExperiences();

        return $this->render('about/index.html.twig', [
            'controller_name' => 'AboutController',
            'title' => 'À propos - Mon portfolio',
            'categories' => $categories,
            'experiences' => $experiences
        ]);
    }
}
