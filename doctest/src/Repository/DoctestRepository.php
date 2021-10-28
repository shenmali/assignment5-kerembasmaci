<?php

namespace App\Repository;

use App\Entity\Doctest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Doctest|null find($id, $lockMode = null, $lockVersion = null)
 * @method Doctest|null findOneBy(array $criteria, array $orderBy = null)
 * @method Doctest[]    findAll()
 * @method Doctest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DoctestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Doctest::class);
    }

    // /**
    //  * @return Doctest[] Returns an array of Doctest objects
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
    public function findOneBySomeField($value): ?Doctest
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
