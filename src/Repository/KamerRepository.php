<?php

namespace App\Repository;

use App\Entity\Kamer;
use App\Entity\Image;
use App\Entity\Soort;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Kamer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kamer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kamer[]    findAll()
 * @method Kamer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KamerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Kamer::class);
    }

    // /**
    //  * @return Kamer[] Returns an array of Kamer objects
    //  */

    public function findWithImage()
    {
        $sql = "SELECT * from kamer INNER JOIN soort on kamer.soort_id = soort.id INNER JOIN image ON kamer.id = image.kamer_id";
        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();

    }

    public function findWithImageWhere($value){
        $sql = "SELECT * from kamer INNER JOIN soort on kamer.soort_id = soort.id INNER JOIN image ON kamer.id = image.kamer_id WHERE kamer.id =" . $value;
        return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAll();
    }


    /*
    public function findOneBySomeField($value): ?Kamer
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
