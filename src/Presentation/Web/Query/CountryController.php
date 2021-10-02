<?php
declare(strict_types=1);

namespace App\Presentation\Web\Query;

use App\Domain\Country;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CountryController extends AbstractController
{
    const DEFAULT_COUNTRIES_MAX_RESULTS = 20;

    #[Route('/api/country/list', methods: ['GET'])]
    public function listCountries(
        EntityManagerInterface $entityManager,
        Request $request
    ): JsonResponse
    {
        $queryBuilder = $entityManager->createQueryBuilder()
            ->select('c')
            ->from(Country::class, 'c');

        $countryCodeFilter = $request->query->get('countryCode');

        if ($countryCodeFilter !== null) {
            $countryCodeFilter = trim($countryCodeFilter);
            if ($countryCodeFilter === '') {
                $queryBuilder->where('c.countryCode is NULL');
            } else {
                $queryBuilder->where('c.countryCode = :countryCode')
                    ->setParameter('countryCode', strtoupper($countryCodeFilter));
            }
        }

        $countries = $queryBuilder
            ->setFirstResult($request->query->getInt('offset'))
            ->setMaxResults(
                $request->query->getInt('itemsPerPage', self::DEFAULT_COUNTRIES_MAX_RESULTS)
            )->getQuery()->getResult();

        return new JsonResponse($countries);
    }
}