<?php

namespace App\Controller\Admin;

use App\Entity\MusageLots;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MusageLotsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MusageLots::class;
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des lots')
            ->setPageTitle('edit', 'Modifier')
            //->setDefaultSort(['livraisonSouhaitee' => 'ASC'])
            ->setDateTimeFormat('d/MM/Y H:mm');
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nomLot', 'Nom du lot'),
            IntegerField::new('quantite', 'quantité en stock'),
            DateTimeField::new('MAJ', 'dernière mise à jour')
        ];
    }
    

    
}
