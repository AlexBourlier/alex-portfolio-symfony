<?php

namespace App\Repository;

use App\Entity\Projects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Projects>
 */
class ProjectsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Projects::class);
    }

    public function getAllProjects(): array
    {
        return $this->createQueryBuilder('p')
         ->select(
            'p.id,
            p.title,
            p.subtitle,
            p.year,
            p.picture,
            p.speciality,
            p.description'
         )
         ->orderBy('p.year', 'DESC')
         ->getQuery()
         ->getResult();
    }
}
