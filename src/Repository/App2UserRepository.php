<?php

namespace App\Repository;

use App\Entity\App2User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method App2User|null find($id, $lockMode = null, $lockVersion = null)
 * @method App2User|null findOneBy(array $criteria, array $orderBy = null)
 * @method App2User[]    findAll()
 * @method App2User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class App2UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, App2User::class);
    }

//    /**
//     * @return App2User[] Returns an array of App2User objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?App2User
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
