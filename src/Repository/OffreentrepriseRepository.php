<?php

namespace App\Repository;

use App\Entity\Offreentreprise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Offreentreprise|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offreentreprise|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offreentreprise[]    findAll()
 * @method Offreentreprise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffreentrepriseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offreentreprise::class);
    }

    // /**
    //  * @return Offreentreprise[] Returns an array of Offreentreprise objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Offreentreprise
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
