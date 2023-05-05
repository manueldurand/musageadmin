<?php

namespace App\Controller\Admin;

use App\Controller\RegistrationController;
use App\Entity\MusageProduits;
use App\Entity\MusageCommandes;
use App\Entity\MusageAdresses;
use App\Entity\MusageClients;
use App\Entity\MusageCodePostal;
use App\Entity\MusageVilles;
use App\Entity\Musagelients;
use App\Entity\MusageCouleurs;
use App\Entity\MusageProduitCategories;
use App\Entity\MusageCommandeProduit;
use App\Entity\MusageLots;
use App\Entity\MusageTypePlante;
use App\Entity\MusageUnite;
use App\Entity\MusageUser;
use Doctrine\Persistence\ManagerRegistry;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        $url = $this->adminUrlGenerator
            ->setController(MusageStockController::class)
            ->generateUrl();

        return $this->redirect($url);

        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(MusageProduitsCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="/assets/logo.png"/>')
            ->setTranslationDomain('admin')
            ->setFaviconPath('/assets/bleu.jpg');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Alerte stock', 'fas fa-triangle-exclamation');
        yield MenuItem::section('Gestion des stocks', 'fas fa-home');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Alerte stock', 'fas fa-triangle-exclamation', MusageProduits::class),
            MenuItem::linkToCrud('Voir les produits', 'fas fa-eye', MusageProduits::class)
            ->setController(MusageProduitsCrudController::class)
            ->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Stock des lots', 'fa fa-gift', MusageLots::class),
            MenuItem::linkToCrud('Ajouter un produit', 'fas fa-plus', MusageProduits::class)->setAction(Crud::PAGE_NEW),
        ]);

        yield MenuItem::section('Gestion des commandes', 'fa fa-basket-shopping');
        yield MenuItem::subMenu('Actions', 'fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('Voir les commandes', 'fas fa-eye', MusageCommandes::class),
            MenuItem::linkToCrud('Détail', 'fas fa-eye', MusageCommandeProduit::class)
        ]);
        yield MenuItem::section('Clients', 'fas fa-users');
        yield MenuItem::linkToCrud('Liste des clients', 'fas fa-address-card', MusageClients::class);
        yield MenuItem::section('Liens utiles', 'fas fa-link');
        yield MenuItem::linkToUrl('Boutique Lafleur', 'fas fa-leaf', 'https://durand.needemand.com/realisations/lafleur/');
        yield MenuItem::linkToUrl('Blog', 'fa fa-camera', 'https://durand.needemand.com/wordpress/');
        yield MenuItem::linkToUrl('Recherche Google', 'fab fa-google', 'https://google.com');
        if($this->IsGranted('ROLE_ADMIN')) {
            yield MenuItem::linkToRoute('nouvel utilisateur', 'fa fa-user', 'app_register');
        }

        yield MenuItem::linkToLogout('Logout', 'fa fa-right-from-bracket');
    }
}
