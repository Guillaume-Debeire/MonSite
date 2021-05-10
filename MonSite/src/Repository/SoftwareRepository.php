<?php

namespace App\Repository;

use App\Entity\Software;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Software|null find($id, $lockMode = null, $lockVersion = null)
 * @method Software|null findOneBy(array $criteria, array $orderBy = null)
 * @method Software[]    findAll()
 * @method Software[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SoftwareRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Software::class);
    }

    public function findSoftwareByParcours($id) 
    {
        $entityManager = $this->getEntityManager();
        $conn = $entityManager->getConnection();
        
            $sql = '
            SELECT software.name
            FROM software
            JOIN software_parcours
            ON software.id = software_parcours.software_id
            WHERE parcours_id = :id
            ';
        
        $stmt = $conn->prepare($sql);
        $stmt->executeStatement(['id' => $id]);
        return $stmt->fetchAllAssociative();
    }

    // /**
    //  * @return Software[] Returns an array of Software objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Software
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
