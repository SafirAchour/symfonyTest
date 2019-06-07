<?php

namespace App\Repository;

use App\Entity\FizzBuzz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FizzBuzz|null find($id, $lockMode = null, $lockVersion = null)
 * @method FizzBuzz|null findOneBy(array $criteria, array $orderBy = null)
 * @method FizzBuzz[]    findAll()
 * @method FizzBuzz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FizzBuzzRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FizzBuzz::class);
    }

    // /**
    //  * @return FizzBuzz[] Returns an array of FizzBuzz objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FizzBuzz
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
