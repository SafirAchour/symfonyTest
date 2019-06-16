<?php

namespace App\Repository;

use App\Entity\ListEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ListEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListEntity[]    findAll()
 * @method ListEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListEntityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ListEntity::class);
    }

    /**
     * @param $price
     * @return ListEntity[]
     */
    public function findAllGreaterThanPrice($number): array
    {
        // automatically knows to select Numbers
        // the "n" is an alias you'll use in the rest of the query
        $qb = $this->createQueryBuilder('n')
        ->andWhere('n.number > :number')
        ->setParameter('number', $number)
        ->orderBy('n.number', 'ASC')
        ->getQuery();
        
        return $qb->execute();
        
        // to get just one result:
        // $product = $qb->setMaxResults(1)->getOneOrNullResult();
    }
}
    // /**
    //  * @return ListEntity[] Returns an array of ListEntity objects
    //  */

    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListEntity
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

