<?php

namespace App\Repository;

use App\Entity\Tap;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Tap|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tap|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tap[]    findAll()
 * @method Tap[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TapRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tap::class);
    }

    // /**
    //  * @return Tap[] Returns an array of Tap objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Tap
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
