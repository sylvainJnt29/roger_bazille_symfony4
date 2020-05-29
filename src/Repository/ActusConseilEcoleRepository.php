<?php

namespace App\Repository;

use App\Entity\ActusConseilEcole;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ActusConseilEcole|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActusConseilEcole|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActusConseilEcole[]    findAll()
 * @method ActusConseilEcole[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActusConseilEcoleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActusConseilEcole::class);
    }

    // /**
    //  * @return ActusConseilEcole[] Returns an array of ActusConseilEcole objects
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
    public function findOneBySomeField($value): ?ActusConseilEcole
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
