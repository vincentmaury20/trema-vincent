<?php

namespace App\Repository;

use App\Entity\Formation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Formation>
 */
class FormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Formation::class);
    }

    //    /**
    //     * @return Formation[] Returns an array of Formation objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Formation
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

// Ce fichier est le repository associé à l’entité Formation.
// Il me permet de créer des requêtes personnalisées pour aller chercher des objets Formation dans la base de données.
// Par défaut, il hérite des méthodes classiques (find, findAll, findBy...) grâce à ServiceEntityRepository.
// Je peux aussi y ajouter mes propres méthodes, comme "findPublished" ou "findRecent", pour filtrer les résultats selon mes besoins.
// C’est un point central pour gérer la logique d’accès aux données liées à l’entité Formation.