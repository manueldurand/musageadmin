<?php

namespace App\Repository;

use App\Entity\MusageTypePlante;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MusageTypePlante>
 *
 * @method MusageTypePlante|null find($id, $lockMode = null, $lockVersion = null)
 * @method MusageTypePlante|null findOneBy(array $criteria, array $orderBy = null)
 * @method MusageTypePlante[]    findAll()
 * @method MusageTypePlante[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MusageTypePlanteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MusageTypePlante::class);
    }

    public function save(MusageTypePlante $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MusageTypePlante $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return MusageTypePlante[] Returns an array of MusageTypePlante objects
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

//    public function findOneBySomeField($value): ?MusageTypePlante
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
