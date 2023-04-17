<?php

namespace App\Repository;

use App\Entity\MusageCouleurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MusageCouleurs>
 *
 * @method MusageCouleurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method MusageCouleurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method MusageCouleurs[]    findAll()
 * @method MusageCouleurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MusageCouleursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MusageCouleurs::class);
    }

    public function save(MusageCouleurs $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MusageCouleurs $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return MusageCouleurs[] Returns an array of MusageCouleurs objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MusageCouleurs
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
