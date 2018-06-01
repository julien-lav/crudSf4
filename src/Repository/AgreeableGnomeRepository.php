<?php

namespace App\Repository;

use App\Entity\AgreeableGnome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AgreeableGnome|null find($id, $lockMode = null, $lockVersion = null)
 * @method AgreeableGnome|null findOneBy(array $criteria, array $orderBy = null)
 * @method AgreeableGnome[]    findAll()
 * @method AgreeableGnome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AgreeableGnomeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AgreeableGnome::class);
    }

//    /**
//     * @return AgreeableGnome[] Returns an array of AgreeableGnome objects
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
    public function findOneBySomeField($value): ?AgreeableGnome
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
