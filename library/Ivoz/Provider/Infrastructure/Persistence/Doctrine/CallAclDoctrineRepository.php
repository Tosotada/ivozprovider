<?php

namespace Ivoz\Provider\Infrastructure\Persistence\Doctrine;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Ivoz\Provider\Domain\Model\CallAcl\CallAclRepository;
use Ivoz\Provider\Domain\Model\CallAcl\CallAcl;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * CallAclDoctrineRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CallAclDoctrineRepository extends ServiceEntityRepository implements CallAclRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CallAcl::class);
    }
}
