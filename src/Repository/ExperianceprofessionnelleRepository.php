<?php

namespace App\Repository;

use App\Entity\Experianceprofessionnelle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Experianceprofessionnelle|null find($id, $lockMode = null, $lockVersion = null)
 * @method Experianceprofessionnelle|null findOneBy(array $criteria, array $orderBy = null)
 * @method Experianceprofessionnelle[]    findAll()
 * @method Experianceprofessionnelle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExperianceprofessionnelleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Experianceprofessionnelle::class);
    }

    // /**
    //  * @return Experianceprofessionnelle[] Returns an array of Experianceprofessionnelle objects
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
    public function findOneBySomeField($value): ?Experianceprofessionnelle
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
