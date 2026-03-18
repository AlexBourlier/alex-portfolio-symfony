<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Form\Model\ContactData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;
use Psr\Log\LoggerInterface;
use Symfony\Component\RateLimiter\RateLimiterFactory;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(
    Request $request,
    MailerInterface $mailer,
    #[Autowire(service: 'limiter.contact_form')] RateLimiterFactory $contactLimiter,
    LoggerInterface $logger
    ): Response
    {
        $contactData = new ContactData();

        $form = $this->createForm(ContactType::class, $contactData);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $limiter = $contactLimiter->create($request->getClientIp());

            if (!$limiter->consume(1)->isAccepted()) {
                $logger->warning('Rate limit contact dépassé', [
                    'ip' => $request->getClientIp(),
                ]);

                $this->addFlash('error', 'Une erreur est survenue.');

                return $this->redirectToRoute('app_contact');
            }

            $email = (new Email())
                ->from('no-reply@portfolio.local')
                ->replyTo($contactData->email)
                ->to('contact@portfolio.local')
                ->subject('[Portfolio] ' . $contactData->subject)
                ->text(
                    "Nom : {$contactData->name}\n" .
                    "Email : {$contactData->email}\n" .
                    "Sujet : {$contactData->subject}\n\n" .
                    "Message :\n{$contactData->message}"
                );

            $mailer->send($email);

            $this->addFlash('success', 'Votre message a bien été envoyé.');

            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig', [
            'title' => 'Contact - Mon portfolio',
            'form' => $form->createView(),
        ]);
    }
}