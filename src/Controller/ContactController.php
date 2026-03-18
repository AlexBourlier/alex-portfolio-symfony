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

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, MailerInterface $mailer): Response
    {
        $contactData = new ContactData();

        $form = $this->createForm(ContactType::class, $contactData);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $email = (new Email())
                ->from('no-reply@ton-domaine.fr')
                ->replyTo($contactData->email)
                ->to('tonadresse@email.fr')
                ->subject('[Portfolio] ' . $contactData->subject)
                ->text(
                    "Nom : {$contactData->name}\n" .
                    "Email : {$contactData->email}\n" .
                    "Sujet : {$contactData->subject}\n\n" .
                    "Message :\n{$contactData->message}"
                );

            try {
                $mailer->send($email);

                $this->addFlash('success', 'Votre message a bien été envoyé.');

                return $this->redirectToRoute('app_contact');
            } catch (TransportExceptionInterface $e) {
                $this->addFlash('error', 'Une erreur est survenue lors de l’envoi du message.');
            }
        }

        return $this->render('contact/index.html.twig', [
            'title' => 'Contact - Mon portfolio',
            'form' => $form->createView(),
        ]);
    }
}