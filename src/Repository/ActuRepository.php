<?php

namespace App\Repository;

use App\Entity\Actu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Actu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actu[]    findAll()
 * @method Actu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Actu::class);
    }

    // public function findAllWithPagination() : Query{
    //     $query =  $this->createQueryBuilder('v');
    //     $query->where('v.image LIKE :actuProf')
    //             ->setParameter('actuProf','actuProf%');
    //     return $query->getQuery();
    // }

     

    public function findProfWithPagination() : Query{
        $query =  $this->createQueryBuilder('v');
        $query->where('v.categorie = :prof ORDER BY v.created_at  DESC') 
                ->setParameter('prof','prof');
        return $query->getQuery();
    }
    public function findPeriscolaireWithPagination() : Query{
        $query =  $this->createQueryBuilder('v');
        $query->where('v.categorie = :periscolaire ORDER BY v.created_at  DESC')
                ->setParameter('periscolaire','periscolaire');
        return $query->getQuery();
    }
    public function findTapWithPagination() : Query{
        $query =  $this->createQueryBuilder('v');
        $query->where('v.categorie = :tap ORDER BY v.created_at  DESC')
                ->setParameter('tap','tap');
        return $query->getQuery();
    }
    public function findParentWithPagination() : Query{
        $query =  $this->createQueryBuilder('v');
        $query->where('v.categorie = :parent ORDER BY v.created_at  DESC')
                ->setParameter('parent','parent');
        return $query->getQuery();
    }
    public function findConseilWithPagination() : Query{
        $query =  $this->createQueryBuilder('v');
        $query->where('v.categorie = :conseil ORDER BY v.created_at  DESC')
                ->setParameter('conseil','conseil');
        return $query->getQuery();
    }


    // /**
    //  * @return Actu[] Returns an array of Actu objects
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
    public function findOneBySomeField($value): ?Actu
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
