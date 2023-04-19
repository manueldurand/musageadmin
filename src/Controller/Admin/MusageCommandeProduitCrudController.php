<?php

namespace App\Controller\Admin;

use App\Entity\MusageCommandeProduit;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MusageCommandeProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MusageCommandeProduit::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('CommandeNumber', 'N° de commande'),
            TextField::new('nomPlante', 'Nom'),
            TextField::new('nomCouleur', 'Couleur'),
            TextField::new('Unite'),
            IntegerField::new('Quantite'),
            TextField::new('etatCommande', 'statut'),

        ];
    }
    
}
