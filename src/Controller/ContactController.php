<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use App\Form\ContactType;
use App\DTO\ContactDTO;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(Request $request, MailerInterface $mailer): Response
    {
        $data = new ContactDTO();

        // // TODO: Supprimer ça plus tard
        // $data->setName("John Doe");
        // $data->setEmail("john.doe@example.com");
        // $data->setMessage("Bonjour, je souhaite vous contacter.");


        $form = $this->createForm(ContactType::class, $data);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mail = (new TemplatedEmail())
                ->to('contact@demo.fr')
                ->from($data->getEmail())
                ->subject('Nouveau message de contact')
                ->htmlTemplate('emails/contact.html.twig')
                ->context(['data' => $data]);

            $mailer->send($mail);
            $this->addFlash('success', 'Votre message a bien été envoyé !');
            return $this->redirectToRoute('app_contact');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
