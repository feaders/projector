<?php

namespace App\Repository;

use App\Entity\EtatProjet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EtatProjet|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtatProjet|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtatProjet[]    findAll()
 * @method EtatProjet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtatProjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtatProjet::class);
    }

    // /**
    //  * @return EtatProjet[] Returns an array of EtatProjet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EtatProjet
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
