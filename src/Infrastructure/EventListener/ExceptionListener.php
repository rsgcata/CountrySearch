<?php
declare(strict_types=1);

namespace App\Infrastructure\EventListener;

use App\Common\Application\InvalidCommandException;
use App\Common\Application\InvalidQueryException;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ExceptionListener
{
    private $params;

    public function __construct(ContainerBagInterface $params)
    {
        $this->params = $params;
    }

    /**
     * @param ExceptionEvent $event
     */
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        // The exceptions will not be handled in debug mode
        if (!$this->params->get('kernel.debug')) {
            $response = $this->createApiResponse($exception);
            $event->setResponse($response);
        }
    }

    /**
     * Creates the ApiResponse from any Exception
     *
     * @param \Throwable $exception
     *
     * @return Response
     */
    private function createApiResponse(\Throwable $exception): Response
    {
        if ($exception instanceof HttpExceptionInterface) {
            return new Response('', $exception->getStatusCode());
        } else if ($exception instanceof InvalidCommandException
            || $exception instanceof \DomainException
            || $exception instanceof InvalidQueryException) {
            return new Response('', Response::HTTP_BAD_REQUEST);
        } else {
            return new Response('', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}