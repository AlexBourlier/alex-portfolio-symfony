<?php

namespace App\Repository;

use App\Entity\Achievements;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Achievements>
 */
class AchievementsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Achievements::class);
    }

    public function getAllAchievements(): array
    {
        return $this->createQueryBuilder('a')
            ->leftJoin('a.skill', 's')
            ->addSelect('s')
            ->orderBy('a.id', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
