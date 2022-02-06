<?php

namespace App\Repository;

use App\Entity\Breeder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Breeder|null find($id, $lockMode = null, $lockVersion = null)
 * @method Breeder|null findOneBy(array $criteria, array $orderBy = null)
 * @method Breeder[]    findAll()
 * @method Breeder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BreederRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Breeder::class);
    }

    // /**
    //  * @return Breeder[] Returns an array of Breeder objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Breeder
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
