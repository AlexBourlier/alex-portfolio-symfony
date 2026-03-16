<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\DomainRepository;

final class SkillsController extends AbstractController
{
    #[Route('/skills', name: 'app_skills')]
    public function index(DomainRepository $domainsRepository): Response
    {
        $domains = $domainsRepository->findAllDomainsWithCompetencies();

        return $this->render('skills/index.html.twig', [
            'controller_name' => 'SkillsController',
            'title' => 'Compétences - Mon portfolio',
            'domains' => $domains,
        ]);
    }
}
