<?php

namespace Ivoz\Provider\Infrastructure\Persistence\Doctrine;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Ivoz\Provider\Domain\Model\ProxyUser\ProxyUserRepository;
use Ivoz\Provider\Domain\Model\ProxyUser\ProxyUser;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * ProxyUserDoctrineRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProxyUserDoctrineRepository extends ServiceEntityRepository implements ProxyUserRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProxyUser::class);
    }
}
