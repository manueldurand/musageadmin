<?php
namespace App\Command;

use App\Entity\MusageProduits;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

#[AsCommand(name: 'app:low-stock')]
class LowStockProductsCommand extends Command
{
    private $entityManager;
    private $mailer;

    public function __construct(EntityManagerInterface $entityManager, MailerInterface $mailer)
    {
        $this->entityManager = $entityManager;
        $this->mailer = $mailer;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Affiche les produits dont le stock est <10 et envoie un mail à l\'admin.');
    }


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $products = $this->entityManager->createQueryBuilder()
            ->select('p')
            ->from(MusageProduits::class, 'p')
            ->where('p.stock < :stock')
            ->setParameter('stock', 10)
            ->getQuery()
            ->getResult();


        foreach ($products as $product) {
            $output->writeln(sprintf('%s %s %s - Stock: %d', 
            $product->getNomPlante(), 
            $product->getnomCouleur(), 
            $product->getMusageTypeUnite(), 
            $product->getStock()));
        }

        $email = (new Email())
            ->from('manuel@musage.net')
            ->to('admin@musage.net')
            ->subject('Produit en stock critique')
            ->html($this->getProductsHtml($products));

        $this->mailer->send($email);

        return Command::SUCCESS;
    }

    private function getProductsHtml(array $products): string
    {
        $html = '<h2>Produits en stock critique</h2>';

        if (count($products) === 0) {
            $html .= '<p>Aucun article à afficher</p>';
        } else {
            $html .= '<ul>';

            foreach ($products as $product) {
                $html .= sprintf('<li>%s %s - Stock: %d</li>', $product->getNomPlante(), $product->getnomCouleur(), $product->getStock());
            }

            $html .= '</ul>';
        }

        return $html;
    }
}
