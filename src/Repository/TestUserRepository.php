<?php

namespace App\Repository;

use App\Entity\TestUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TestUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestUser[]    findAll()
 * @method TestUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestUserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TestUser::class);
    }

//    /**
//     * @return TestUser[] Returns an array of TestUser objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TestUser
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
