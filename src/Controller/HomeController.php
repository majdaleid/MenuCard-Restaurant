<?php

namespace App\Controller;

use App\Repository\GerichtRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(GerichtRepository $gr): Response
    {
        $gerichte = $gr->findAll();

        if (empty($gerichte)) {
            return $this->render('home/index.html.twig');
        }

        if (count($gerichte) == 1) {
            return $this->render('home/index.html.twig', [
                'gericht1' => $gerichte[0],
            ]);
        }

        $zufall = array_rand($gerichte, 2);

        return $this->render('home/index.html.twig', [
            'gericht1' => $gerichte[$zufall[0]],
            'gericht2' => $gerichte[$zufall[1]],
        ]);
    }
}
