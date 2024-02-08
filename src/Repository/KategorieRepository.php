<?php

namespace App\Repository;

use App\Entity\Kategorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Kategorie>
 *
 * @method Kategorie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kategorie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kategorie[]    findAll()
 * @method Kategorie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KategorieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kategorie::class);
    }

//    /**
//     * @return Kategorie[] Returns an array of Kategorie objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('k.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Kategorie
//    {
//        return $this->createQueryBuilder('k')
//            ->andWhere('k.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
