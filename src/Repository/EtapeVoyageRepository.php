<?php

namespace App\Repository;

use App\Entity\EtapeVoyage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EtapeVoyage|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtapeVoyage|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtapeVoyage[]    findAll()
 * @method EtapeVoyage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtapeVoyageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtapeVoyage::class);
    }

    // /**
    //  * @return EtapeVoyage[] Returns an array of EtapeVoyage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EtapeVoyage
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
