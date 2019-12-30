<?php

namespace App\Repository;

use App\Entity\Responsablesignaleretudiant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Responsablesignaleretudiant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Responsablesignaleretudiant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Responsablesignaleretudiant[]    findAll()
 * @method Responsablesignaleretudiant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResponsablesignaleretudiantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Responsablesignaleretudiant::class);
    }

    // /**
    //  * @return Responsablesignaleretudiant[] Returns an array of Responsablesignaleretudiant objects
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
    public function findOneBySomeField($value): ?Responsablesignaleretudiant
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
