<?php

namespace App\Controller\Admin;

use App\Entity\MusageCommandes;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MusageCommandesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MusageCommandes::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des commandes')
            ->setPageTitle('edit', 'Modifier')
            ->setDefaultSort(['livraisonSouhaitee' => 'ASC'])
            ->setDateTimeFormat('d/MM/Y H:mm');
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('Client'),
            DateTimeField::new('dateCommande'),
            DateTimeField::new('livraisonSouhaitee', 'livraison souhaitée'),
            TextField::new('etatCommande', 'statut'),
            TextField::new('nomLot', 'Cadeau')->onlyOnDetail(),

        ];
    }
    
}
