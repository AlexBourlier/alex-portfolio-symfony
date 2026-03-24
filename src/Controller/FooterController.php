<?php

namespace App\Controller;

use App\Repository\SocialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FooterController extends AbstractController
{
    #[Route('/_footer', name: 'app_footer')]
    public function index(SocialRepository $socialRepository): Response
    {
        return $this->render('partials/footerArea.html.twig', [
            'socials' => $socialRepository->findAllOrdered(),
        ]);
    }
}
