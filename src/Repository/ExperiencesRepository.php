<?php

namespace App\Repository;

use App\Entity\Experiences;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Experiences>
 */
class ExperiencesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Experiences::class);
    }

    public function findAllExperiences(): array
    {
        return $this->createQueryBuilder('e')
            ->select(
                'e.title,
                e.dateDebut,
                e.dateFin,
                e.description'
                )
            ->orderBy('e.dateDebut', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findMinDate(): ?array
    {
        return $this->createQueryBuilder('e')
            ->select('MIN(e.dateDebut) AS minDate')
            ->getQuery()
            ->getOneOrNullResult();
    }
}
