<?php

namespace App\Controller\Admin;

use App\Entity\MusageCommandeProduit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
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
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste détaillée des commandes')
            ->setPageTitle('edit', 'Modifier')
            //->setDefaultSort(['livraisonSouhaitee' => 'ASC'])
            ->setDateTimeFormat('d/MM/Y H:mm');
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('CommandeNumber', 'N° de commande'),
            TextField::new('nomPlante', 'Nom'),
            TextField::new('nomCouleur', 'Couleur'),
            TextField::new('Unite'),
            IntegerField::new('Quantite', 'quantité'),
            IntegerField::new('Status', 'statut'),
            DateTimeField::new('DateCom', 'date de commande'),
            DateTimeField::new('DateSouhaitee', 'livraison demandée'),

            TextField::new('Client'),
            TextField::new('nomLot', 'Cadeau')


        ];
    }
    
}
