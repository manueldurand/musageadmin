<?php

namespace App\Repository;

use App\Entity\MusageCodePostal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MusageCodePostal>
 *
 * @method MusageCodePostal|null find($id, $lockMode = null, $lockVersion = null)
 * @method MusageCodePostal|null findOneBy(array $criteria, array $orderBy = null)
 * @method MusageCodePostal[]    findAll()
 * @method MusageCodePostal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MusageCodePostalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MusageCodePostal::class);
    }

    public function save(MusageCodePostal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MusageCodePostal $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return MusageCodePostal[] Returns an array of MusageCodePostal objects
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

//    public function findOneBySomeField($value): ?MusageCodePostal
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
