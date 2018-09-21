<?php

namespace App\Repository;

use App\Entity\RepetitionMaximum;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RepetitionMaximum|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepetitionMaximum|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepetitionMaximum[]    findAll()
 * @method RepetitionMaximum[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepetitionMaximumRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RepetitionMaximum::class);
    }

//    /**
//     * @return RepetitionMaximum[] Returns an array of RepetitionMaximum objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RepetitionMaximum
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
