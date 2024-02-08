<?php

namespace App\Controller;

use App\Entity\Gericht;
use App\Form\GerichtType;
use App\Repository\GerichtRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

#[Route('/gericht', name: 'gericht.')]

class GerichtController extends AbstractController
{
    #[Route('/', name: 'bearbeiten')]
    public function index(GerichtRepository $gr): Response
    {
        $gerichte = $gr->findAll();

        return $this->render('gericht/index.html.twig', [
            'gerichte' => $gerichte,
        ]);
    }

    #[Route('/anlegen', name: 'anlegen')]
    public function anlegen(Request $request, ManagerRegistry $doctrine)
    {
        $gericht = new Gericht();
        $form = $this->createForm(GerichtType::class, $gericht);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $bild = $form['bild']->getData();
            if ($bild) {
                $dateiname = md5(uniqid()) . '.' . $bild->guessClientExtension();
                $bild->move(
                    $this->getParameter('bilder_ordner'),
                    $dateiname
                );
                $gericht->setBild($dateiname);
            }

            $em->persist($gericht);
            $em->flush();
            return $this->redirect($this->generateUrl('gericht.bearbeiten'));
        }

        return $this->render('gericht/anlegen.html.twig', [
            'anlegenForm' => $form->createView()
        ]);
    }


    #[Route('/entfernen/{id}', name: 'entfernen')]
    public function entfernen($id, ManagerRegistry $doctrine, GerichtRepository $gr)
    {
        $em = $doctrine->getManager();
        $gericht = $gr->find($id);
        $em->remove($gericht);
        $em->flush();

        $this->addFlash('erfolg', 'Gericht wurde erfolgreich entfernt');

        return $this->redirect($this->generateUrl('gericht.bearbeiten'));
    }


    #[Route('/anzeigen/{id}', name: 'anzeigen')]
    public function anzeigen(Gericht $gericht)
    {
        return $this->render('gericht/anzeigen.html.twig', [
            'gericht' => $gericht,
        ]);

        /* dd($gericht);
        $em = $doctrine->getManager();
        $gericht = $gr->find($id);
        $em->remove($gericht);
        $em->flush();

        $this->addFlash('erfolg', 'Gericht wurde erfolgreich entfernt');

        return $this->redirect($this->generateUrl('gericht.bearbeiten'));*/
    }



    #[Route('/preis/{id}', name: 'preis')]
    public function preis($id, GerichtRepository $gerichtRepository)
    {
        $gericht = $gerichtRepository->find5Euro($id);

        dump($gericht);
    }
}
