<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use App\Entity\MusageProduits;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;

class MusageStockController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MusageProduits::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Alerte stocks')
            ->setDateTimeFormat('d/MM/Y H:mm')
            ->setDefaultSort(['stock'=> 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomPlante', 'Nom'),
            TextField::new('nomCouleur', 'couleur'),
            TextField::new('musageTypeUnite', 'unité'),
            IntegerField::new('stock'),
            DateTimeField::new('DateMAJ', 'dernière mise à jour'),
        ];
    }


    
}
