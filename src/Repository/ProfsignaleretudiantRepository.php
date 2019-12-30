<?php

namespace App\Repository;

use App\Entity\Profsignaleretudiant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Profsignaleretudiant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Profsignaleretudiant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Profsignaleretudiant[]    findAll()
 * @method Profsignaleretudiant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProfsignaleretudiantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Profsignaleretudiant::class);
    }

    // /**
    //  * @return Profsignaleretudiant[] Returns an array of Profsignaleretudiant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Profsignaleretudiant
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
