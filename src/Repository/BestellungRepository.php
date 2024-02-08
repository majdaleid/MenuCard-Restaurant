<?php

namespace App\Repository;

use App\Entity\Bestellung;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bestellung>
 *
 * @method Bestellung|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bestellung|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bestellung[]    findAll()
 * @method Bestellung[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BestellungRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bestellung::class);
    }

//    /**
//     * @return Bestellung[] Returns an array of Bestellung objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Bestellung
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
