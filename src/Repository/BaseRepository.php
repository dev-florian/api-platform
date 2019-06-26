<?php

namespace App\Repository;

use App\Entity\BaseEntity;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * BaseRepository
 *
 * @author Florian THUBÉ
 */
abstract class BaseRepository extends EntityRepository
{

}
