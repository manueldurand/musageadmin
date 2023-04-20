<?php

namespace App\Controller\Admin;

use App\Entity\MusageClients;
use App\Entity\MusageVilles;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MusageClientsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MusageClients::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des clients')
            ->setPageTitle('edit', 'Modifier')
            //->setDefaultSort(['livraisonSouhaitee' => 'ASC'])
            ->setDateTimeFormat('d/MM/Y H:mm');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Client', 'Nom Prénom'),
            TextField::new('adresseClient', 'adresse'),
            TextField::new('complementAdresseClient', 'complément'),
            TextField::new('codePostalClient', 'code postal'),
            TextField::new('villeClient', 'ville'),
            EmailField::new('emailClient', 'email'),
            TelephoneField::new('telephone', 'téléphone')


        ];
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
