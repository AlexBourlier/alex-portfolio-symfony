<?php

namespace App\Repository;

use App\Entity\Education;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Education>
 */
class EducationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Education::class);
    }

    public function findAllEducations(): array
    {
        return $this->createQueryBuilder('ed')
            ->select(
                'ed.id,
                ed.title,
                ed.institution,
                ed.dateDebut,
                ed.dateFin,
                ed.description'
                )
            ->orderBy('ed.dateDebut', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function findEducationPeriod(): ?array
    {
        return $this->createQueryBuilder('ed')
            ->select('MIN(ed.dateDebut) AS minDate, MAX(ed.dateFin) AS maxDate')
            ->getQuery()
            ->getOneOrNullResult();
    }
}
