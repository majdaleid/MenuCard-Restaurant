<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;


use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

use App\Entity\Gericht;
use App\Entity\Kategorie;

class DashboardController extends AbstractDashboardController
{


    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //$adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        //return $this->redirect($adminUrlGenerator->setController(GerichtCrudController::class)->generateUrl());

        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(GerichtCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Your Dashboard Title');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Menukarte');
        yield MenuItem::linkToCrud('Gericht', 'fa fa-cube', Gericht::class);
        yield MenuItem::linkToCrud('Kategorie', 'fa fa-tasks', Kategorie::class);
        // Ensure this matches the class name and namespace of your GerichtCrudController
        // yield MenuItem::linkToCrud('Gericht', 'fas fa-list', Gericht::class);
    }
}
