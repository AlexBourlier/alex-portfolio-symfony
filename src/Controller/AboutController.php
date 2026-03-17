<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SkillsCategoryRepository;
use App\Repository\ExperiencesRepository;
use App\Repository\EducationRepository;

final class AboutController extends AbstractController
{
    #[Route('/about', name: 'app_about')]
    public function index(
        SkillsCategoryRepository $skillsCategoryRepository, 
        ExperiencesRepository $experiencesRepository,
        EducationRepository $educationRepository
        ): Response
    {
        $categories = $skillsCategoryRepository->findAllCategoriesWithSkills();
        $experiences = $experiencesRepository->findAllExperiences();
        $experiencesStart = $experiencesRepository->findMinDate();
        $educations = $educationRepository->findAllEducations();
        $educationPeriods = $educationRepository->findEducationPeriod();

        return $this->render('about/index.html.twig', [
            'controller_name' => 'AboutController',
            'title' => 'À propos - Mon portfolio',
            'categories' => $categories,
            'experiences' => $experiences,
            'experiencesStart' => $experiencesStart,
            'educations' => $educations,
            'educationPeriods' => $educationPeriods,
        ]);
    }
}
