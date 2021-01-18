<?php

namespace App\Repository;

use App\Entity\DepotTravaux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DepotTravaux|null find($id, $lockMode = null, $lockVersion = null)
 * @method DepotTravaux|null findOneBy(array $criteria, array $orderBy = null)
 * @method DepotTravaux[]    findAll()
 * @method DepotTravaux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DepotTravauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DepotTravaux::class);
    }

    // /**
    //  * @return DepotTravaux[] Returns an array of DepotTravaux objects
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
    public function findOneBySomeField($value): ?DepotTravaux
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
