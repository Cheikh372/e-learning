<?php

namespace App\Repository;

use App\Entity\DepotTraveaux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DepotTraveaux|null find($id, $lockMode = null, $lockVersion = null)
 * @method DepotTraveaux|null findOneBy(array $criteria, array $orderBy = null)
 * @method DepotTraveaux[]    findAll()
 * @method DepotTraveaux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepotTraveauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DepotTraveaux::class);
    }

    // /**
    //  * @return DepotTraveaux[] Returns an array of DepotTraveaux objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DepotTraveaux
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
