<?php
declare(strict_types=1);

namespace App\Infrastructure\Domain;

use App\Domain\ICountryRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use App\Domain\Country;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Country|null find($id, $lockMode = null, $lockVersion = null)
 */
class CountryRepository extends ServiceEntityRepository implements ICountryRepository
{
    public function __construct(ManagerRegistry $registry) {
        parent::__construct($registry, Country::class);
    }

    public function save(Country $country): void
    {
        $this->_em->persist($country);
        $this->_em->flush();
    }
}