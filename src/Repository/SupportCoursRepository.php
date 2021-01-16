<?php

namespace App\Repository;

use App\Entity\SupportCours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SupportCours|null find($id, $lockMode = null, $lockVersion = null)
 * @method SupportCours|null findOneBy(array $criteria, array $orderBy = null)
 * @method SupportCours[]    findAll()
 * @method SupportCours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SupportCoursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SupportCours::class);
    }

    // /**
    //  * @return SupportCours[] Returns an array of SupportCours objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SupportCours
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
