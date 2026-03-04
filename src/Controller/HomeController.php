<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'titre' => 'Bienvenue sur mon portfolio',
            'contenu' => 'Je suis un développeur passionné par la création de solutions innovantes et efficaces. Mon portfolio présente une sélection de mes projets les plus récents, mettant en avant mes compétences en développement web, mobile et logiciel. N\'hésitez pas à parcourir mes réalisations et à me contacter pour toute collaboration ou opportunité professionnelle.',
        ]);
    }
}
