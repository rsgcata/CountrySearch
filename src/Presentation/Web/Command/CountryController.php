<?php
declare(strict_types=1);

namespace App\Presentation\Web\Command;

use App\Application\Command\ChangeCountryDetailsCommand;
use App\Application\Command\ChangeCountryDetailsCommandHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CountryController extends AbstractController
{
    #[Route('/api/country/change-details', methods: ['POST'])]
    public function changeDetails(
        ChangeCountryDetailsCommand $command,
        ChangeCountryDetailsCommandHandler $handler
    ): Response
    {
        $handler->handle($command);
        return new Response();
    }
}