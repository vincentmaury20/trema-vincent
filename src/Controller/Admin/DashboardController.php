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
        // l'url par défaut est /admin 
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
        yield MenuItem::linkToCrud('Utilisateurs', 'fa fa-users', User::class);
        yield MenuItem::linkToCrud('Témoignages', 'fa fa-testimony', Testimony::class);

        yield MenuItem::section('Autres');
        yield MenuItem::linkToDashboard('Accueil admin', 'fa fa-home');
        yield MenuItem::linkToLogout('Déconnexion', 'fa fa-sign-out');


        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}

// Ce fichier configure le tableau de bord de l’administration avec EasyAdmin.
// Grâce à l’attribut #[AdminDashboard], je définis que l’interface admin sera accessible via la route "/admin".

// La méthode index() est appelée quand j’accède à /admin.
// Elle redirige automatiquement vers le CRUD des pages (PageCrudController), ce qui me permet d’atterrir directement sur une section utile.

// La méthode configureDashboard() me permet de personnaliser le titre affiché en haut du dashboard. Ici, j’ai mis "Trema Vincent".

// La méthode configureMenuItems() définit le menu latéral de l’interface admin.
// Je crée des sections (ex : "Gestion du contenu") et j’ajoute des liens vers les entités que je veux gérer en CRUD :
// - Pages
// - Formations
// - Utilisateurs
// - Témoignages

// Je peux aussi ajouter des liens vers l’accueil admin ou la déconnexion.

// En résumé : ce fichier me permet de construire une interface d’administration complète,
// avec des routes bien séparées du site public, pour gérer mes contenus facilement.