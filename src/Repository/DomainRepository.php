<?php

namespace App\Repository;

use App\Entity\Domain;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Domain>
 */
class DomainRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Domain::class);
    }

    // Retourner les catégories de compétences
    public function findAllDomainsSkill(): array
    {
        return $this->createQueryBuilder('d')
            ->select(
                'd.title'
            )
            ->getQuery()
            ->getResult();
    }
}
