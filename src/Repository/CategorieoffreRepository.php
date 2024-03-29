<?php

namespace App\Repository;

use App\Entity\Categorieoffre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Categorieoffre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Categorieoffre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Categorieoffre[]    findAll()
 * @method Categorieoffre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieoffreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Categorieoffre::class);
    }

    // /**
    //  * @return Categorieoffre[] Returns an array of Categorieoffre objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Categorieoffre
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
