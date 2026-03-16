<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    // Retourner les informations de la table user 
    public function findAllUsers(): array
    {
        return $this->createQueryBuilder('u')
            ->select(
                'u.id, 
                u.firstname, 
                u.lastname,
                u.phone,
                u.poste,
                u.city, 
                u.aPropos, 
                u.email'
                )
            ->getQuery()
            ->getResult();
    }
}
