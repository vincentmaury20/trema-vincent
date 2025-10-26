<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Formation;
use App\Entity\Page;
use App\Entity\User;
use App\Entity\SocialLink;
use App\Entity\Testimony;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        $url = $adminUrlGenerator->setController(PageCrudController::class)->generateUrl();

        return $this->redirect($url);
    }


    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Trema Vincent');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::section('Gestion du contenu');

        yield MenuItem::linkToCrud('Pages', 'fa fa-file', Page::class);
        yield MenuItem::linkToCrud('Formations', 'fa fa-graduation-cap', Formation::class);
        yield MenuItem::linkToCrud('Liens sociaux', 'fa fa-link', SocialLink::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-users', User::class);
        yield MenuItem::linkToCrud('Témoignages', 'fa fa-testimony', Testimony::class);

        yield MenuItem::section('Autres');
        yield MenuItem::linkToDashboard('Accueil admin', 'fa fa-home');
        yield MenuItem::linkToLogout('Déconnexion', 'fa fa-sign-out');


        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
