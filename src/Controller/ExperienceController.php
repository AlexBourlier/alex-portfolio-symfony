<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\AchievementsRepository;

final class ExperienceController extends AbstractController
{
    #[Route('/experience', name: 'app_experience')]
    public function index(AchievementsRepository $achievementsRepository): Response
    {
        $achievements = $achievementsRepository->getAllAchievements();

        return $this->render('experience/index.html.twig', [
            'controller_name' => 'ExperienceController',
            'title' => 'Expérience - Mon portfolio',
            'achievements' => $achievements,
        ]);
    }
}