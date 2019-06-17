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
     * @param $number
     * @return ListEntity[]
     */
    public function findAllIntegersTest($number): array
    {
        $entityManager = $this->getEntityManager();
        
        $query = $entityManager->createQuery(
            'SELECT n
            FROM App\Entity\Fizz n
            ORDER BY n.number ASC'
            );
            
            // returns an array of Product objects
            return $query->execute();
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

