<?php

namespace App\Repository;

use App\Entity\Gericht;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Gericht>
 *
 * @method Gericht|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gericht|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gericht[]    findAll()
 * @method Gericht[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GerichtRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gericht::class);
    }


    public function find5Euro(int $id)
    {
        $qb = $this->createQueryBuilder('g');
        $qb->select('g.name, g.preis')
            ->where('g.preis <= 5');

        return $qb->getQuery()->getResult();
    }
    //    /**
    //     * @return Gericht[] Returns an array of Gericht objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('g.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Gericht
    //    {
    //        return $this->createQueryBuilder('g')
    //            ->andWhere('g.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
