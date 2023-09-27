<?php

namespace App\Repository;

use App\Entity\Born;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Born>
 *
 * @method Born|null find($id, $lockMode = null, $lockVersion = null)
 * @method Born|null findOneBy(array $criteria, array $orderBy = null)
 * @method Born[]    findAll()
 * @method Born[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BornRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Born::class);
    }

//    /**
//     * @return Born[] Returns an array of Born objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Born
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
