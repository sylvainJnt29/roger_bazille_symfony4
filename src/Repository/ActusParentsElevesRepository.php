<?php

namespace App\Repository;

use App\Entity\ActusParentsEleves;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActusParentsEleves|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActusParentsEleves|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActusParentsEleves[]    findAll()
 * @method ActusParentsEleves[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActusParentsElevesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActusParentsEleves::class);
    }

    // /**
    //  * @return ActusParentsEleves[] Returns an array of ActusParentsEleves objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ActusParentsEleves
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
