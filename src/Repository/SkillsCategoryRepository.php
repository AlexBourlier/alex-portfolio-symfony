<?php

namespace App\Repository;

use App\Entity\SkillsCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SkillsCategory>
 */
class SkillsCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SkillsCategory::class);
    }

        public function findAllCategoriesWithSkills(): array
        {
            return $this->createQueryBuilder('sc')
                ->leftJoin('sc.skills', 's')
                ->addSelect('s')
                ->orderBy('sc.title', 'ASC')
                ->addOrderBy('s.title', 'ASC')
                ->getQuery()
                ->getResult();
        }
}
