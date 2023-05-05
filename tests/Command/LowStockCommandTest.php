namespace App\Tests\Command;

use App\Command\LowStockProductsCommand;
use App\Entity\MusageProduits;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class LowStockProductsCommandTest extends TestCase
{
    public function testExecute()
    {
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $entityManager
            ->expects($this->once())
            ->method('createQueryBuilder')
            ->willReturnSelf();

        $entityManager
            ->expects($this->once())
            ->method('getQuery')
            ->willReturnSelf();

        $entityManager
            ->expects($this->once())
            ->method('getResult')
            ->willReturn([$this->createMock(MusageProduits::class)]);

        $mailer = $this->createMock(MailerInterface::class);
        $mailer
            ->expects($this->once())
            ->method('send')
            ->with($this->callback(function (Email $email) {
                return $email->getTo()[0]->getAddress() === 'admin@musage.net' &&
                    $email->getSubject() === 'Produit en stock critique' &&
                    strpos($email->getHtmlBody(), '<h2>Produits en stock critique</h2>') !== false;
            }));

        $application = new Application();
        $application->add(new LowStockProductsCommand($entityManager, $mailer));

        $command = $application->find('app:low-stock');
        $commandTester = new CommandTester($command);
        $commandTester->execute([]);

        $this->assertStringContainsString('Stock:', $commandTester->getDisplay());
        $this->assertSame(0, $commandTester->getStatusCode());
    }
}
