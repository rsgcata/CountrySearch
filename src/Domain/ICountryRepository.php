<?php
declare(strict_types=1);

namespace App\Domain;

use Doctrine\Persistence\ObjectRepository;

/**
 * @method Country|null find($id, $lockMode = null, $lockVersion = null)
 */
interface ICountryRepository extends ObjectRepository
{
    public function save(Country $country): void;
}