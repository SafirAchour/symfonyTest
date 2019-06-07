<?php

namespace App\Repository;

use App\Entity\Buzz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Buzz|null find($id, $lockMode = null, $lockVersion = null)
 * @method Buzz|null findOneBy(array $criteria, array $orderBy = null)
 * @method Buzz[]    findAll()
 * @method Buzz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BuzzRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Buzz::class);
    }

    // /**
    //  * @return Buzz[] Returns an array of Buzz objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Buzz
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
