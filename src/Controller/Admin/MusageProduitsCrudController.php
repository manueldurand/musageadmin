<?php

namespace App\Controller\Admin;

use App\Entity\MusageProduits;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CurrencyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class MusageProduitsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MusageProduits::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Catalogue des produits')
            ->setPageTitle('detail', 'Détail')
            ->setPageTitle('new', 'Ajouter un produit')
            ->setPageTitle('edit', 'Modifier');            ;
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL);
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nomPlante', 'Nom'),
            TextField::new('nomCouleur', 'couleur'),
            TextField::new('musageTypeUnite', 'unité'),
            TextField::new('description'),
            IntegerField::new('stock'),
            MoneyField::new('prix')->setCurrency('EUR')->setStoredAsCents(false),
            ImageField::new('image1')->setBasePath('assets')->setUploadDir('public/assets'),
        ];
    }
    
}
