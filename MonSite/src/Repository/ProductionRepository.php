<?php

namespace App\Repository;

use App\Entity\Production;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Production|null find($id, $lockMode = null, $lockVersion = null)
 * @method Production|null findOneBy(array $criteria, array $orderBy = null)
 * @method Production[]    findAll()
 * @method Production[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Production::class);
    }


    public function findExerciceByParcours($name) 
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            "SELECT e
            FROM App\Entity\Exercice e
            JOIN App\Entity\Production p
            WITH e.id = p.exercice
            JOIN App\Entity\Parcours c
            WITH p.parcours = c.id
            WHERE c.name = :name"
        );
        $query->setParameter(':name', $name);
        
        return $query->getArrayResult();
    }

    public function findApplicationByParcours($name) 
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            "SELECT a
            FROM App\Entity\Application a
            JOIN App\Entity\Production p
            WITH a.id = p.application
            JOIN App\Entity\Parcours c
            WITH p.parcours = c.id
            WHERE c.name = :name"
        );
        $query->setParameter(':name', $name);
        
        return $query->getArrayResult();
    }

    public function findAudiovisuelByParcours($name) 
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            "SELECT a
            FROM App\Entity\Audiovisuel a
            JOIN App\Entity\Production p
            WITH a.id = p.audiovisuel
            JOIN App\Entity\Parcours c
            WITH p.parcours = c.id
            WHERE c.name = :name"
        );
        $query->setParameter(':name', $name);
        
        return $query->getArrayResult();
    }
    // public function findProductionByParcours($id) 
    // {
    //     $entityManager = $this->getEntityManager();
    //     $query = $entityManager->createQuery(
    //         "SELECT p
    //         FROM App\Entity\Production p
    //         JOIN App\Entity\Audiovisuel a
    //         WITH p.audiovisuel = a.id
    //         JOIN App\Entity\Application b
    //         WITH p.application = b.id
    //         JOIN App\Entity\Exercice e
    //         WITH p.exercice = e.id
    //         JOIN App\Entity\Parcours c
    //         WITH p.parcours = c.id
    //         WHERE c.id = :id"
    //     );
    //     $query->setParameter(':id', $id);
        
    //     return $query->getArrayResult();
    // }
    public function findProductionByParcours($id) 
    {
        $entityManager = $this->getEntityManager();
        $conn = $entityManager->getConnection();
        
            $sql = '
            SELECT production.*
            FROM production
            WHERE parcours_id = :id
            ';
        
        $stmt = $conn->prepare($sql);
        $stmt->executeStatement(['id' => $id]);
        return $stmt->fetchAllAssociative();
    }


    // /**
    //  * @return Production[] Returns an array of Production objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Production
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
