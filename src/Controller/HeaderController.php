<?php

namespace App\Controller;

use App\Repository\SocialRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HeaderController extends AbstractController
{
    #[Route('/_header', name: 'app_header')]
    public function index(SocialRepository $socialRepository, UserRepository $userRepository): Response
    {
        return $this->render('partials/header.html.twig', [
            'socials' => $socials = $socialRepository->findAllOrdered(),
            'users' => $users = $userRepository->findAllUsers()
        ]);
    }
}
