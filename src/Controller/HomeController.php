<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\UserRepository;

final class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(UserRepository $userRepository): Response
    {
        $users = $userRepository->findAllUsers();

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'title' => 'Accueil - Mon portfolio',
            'users' => $users,
        ]);


    }
}
