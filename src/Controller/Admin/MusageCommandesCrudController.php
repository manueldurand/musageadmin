<?php

namespace App\Controller\Admin;

use App\Entity\MusageCommandes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MusageCommandesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MusageCommandes::class;
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
