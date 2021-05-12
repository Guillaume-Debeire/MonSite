<?php

namespace App\Repository;

use App\Entity\Doc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Doc|null find($id, $lockMode = null, $lockVersion = null)
 * @method Doc|null findOneBy(array $criteria, array $orderBy = null)
 * @method Doc[]    findAll()
 * @method Doc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Doc::class);
    }

    public function findDocByParcours($id) 
    {
        $entityManager = $this->getEntityManager();
        $conn = $entityManager->getConnection();
        
            $sql = '
            SELECT *
            FROM doc
            WHERE parcours_id = :id
            ';
        
        $stmt = $conn->prepare($sql);
        $stmt->executeStatement(['id' => $id]);
        return $stmt->fetchAllAssociative();
    }

    public function findDocByApplication($id) 
    {
        $entityManager = $this->getEntityManager();
        $conn = $entityManager->getConnection();
        
            $sql = '
            SELECT *
            FROM doc
            WHERE application_id = :id
            ';
        
        $stmt = $conn->prepare($sql);
        $stmt->executeStatement(['id' => $id]);
        return $stmt->fetchAllAssociative();
    }

    // /**
    //  * @return Doc[] Returns an array of Doc objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Doc
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
