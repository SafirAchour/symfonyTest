<?php

namespace App\Repository;

use App\Entity\Fizz;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fizz|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fizz|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fizz[]    findAll()
 * @method Fizz[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FizzRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fizz::class);
    }

    // /**
    //  * @return Fizz[] Returns an array of Fizz objects
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
    public function findOneBySomeField($value): ?Fizz
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
