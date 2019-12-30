<?php

namespace App\Repository;

use App\Entity\Responsableentreprise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Responsableentreprise|null find($id, $lockMode = null, $lockVersion = null)
 * @method Responsableentreprise|null findOneBy(array $criteria, array $orderBy = null)
 * @method Responsableentreprise[]    findAll()
 * @method Responsableentreprise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponsableentrepriseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Responsableentreprise::class);
    }

    // /**
    //  * @return Responsableentreprise[] Returns an array of Responsableentreprise objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Responsableentreprise
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
