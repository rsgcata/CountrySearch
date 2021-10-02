<?php

declare(strict_types=1);

namespace App\Common\Application;

use Symfony\Component\HttpFoundation\RequestStack;
use Throwable;

abstract class AbstractCommand
{
    /**
     * @throws InvalidCommandException Thrown if input data invalid (data types or not deliberate)
     */
    public final function __construct(RequestStack $request)
    {
        $this->checkDeliberateCommand($request);
        $this->buildCommandData($request);
    }

    protected function checkDeliberateCommand(RequestStack $request): void
    {
        if($this instanceof IDeliberateCommand
            && $request->getCurrentRequest()->headers->get(IDeliberateCommand::HEADER_NAME)
            !== IDeliberateCommand::HEADER_VALUE) {
            throw new InvalidCommandException('Not deliberate request');
        }
    }

    protected function buildCommandData(RequestStack $request): void
    {
        try {
            $requestJsonData = $request->getCurrentRequest()->toArray();

            foreach ($requestJsonData as $field => $value) {
                $this->$field = $value;
            }
        } catch (Throwable $e) {
            throw new InvalidCommandException($e->getMessage());
        }
    }
}