<?php

namespace App\Controller;

use Doctrine\DBAL\Types\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType as TypeTextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;

class RegistrierungController extends AbstractController
{
    #[Route('/reg', name: 'reg')]
    public function reg(Request $request, UserPasswordHasherInterface $passEncoder, ManagerRegistry $doctrine): Response
    {
        $regform = $this->createFormBuilder()
            ->add('username', TypeTextType::class, [ // Use the alias for Symfony's TextType
                'label' => 'MitArbeiter'
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'required' => true,
                'first_options' => ['label' => 'Passwort'],
                'second_options' => ['label' => 'Passwort Wiederholen']
            ])
            ->add('registrieren', SubmitType::class)
            ->getForm();

        $regform->handleRequest($request);
        if ($regform->isSubmitted() && $regform->isValid()) {
            $eingabe = $regform->getData();
            $user = new User();
            $user->setUsername($eingabe['username']);
            $user->setPassword($passEncoder->hashPassword($user, $eingabe['password']));

            $em = $doctrine->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirect($this->generateUrl('home'));
        }

        // Return the form in a response outside the if block to ensure a Response is always returned
        return $this->render('registrierung/index.html.twig', [
            'regform' => $regform->createView()
        ]);
    }
}
