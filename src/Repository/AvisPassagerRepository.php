<?php

namespace App\Repository;

use App\Entity\AvisPassager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method AvisPassager|null find($id, $lockMode = null, $lockVersion = null)
 * @method AvisPassager|null findOneBy(array $criteria, array $orderBy = null)
 * @method AvisPassager[]    findAll()
 * @method AvisPassager[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvisPassagerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AvisPassager::class);
    }

    // /**
    //  * @return AvisPassager[] Returns an array of AvisPassager objects
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
    public function findOneBySomeField($value): ?AvisPassager
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
