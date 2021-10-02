<?php

namespace App\Tests\Unit\Application\Command;

use App\Application\Command\ChangeCountryDetailsCommand;
use App\Application\Command\ChangeCountryDetailsCommandHandler;
use App\Common\Application\ITransaction;
use App\Domain\Country;
use App\Domain\ICountryRepository;
use PHPUnit\Framework\TestCase;

class ChangeCountryDetailsCommandTest extends TestCase
{
    public function testChangeIsMadeAndCountryIsSaved()
    {
        $transactionMock = $this->createMock(ITransaction::class);
        $repository = $this->createMock(ICountryRepository::class);
        $countryMock = $this->createMock(Country::class);
        $commandMock = $this->createMock(ChangeCountryDetailsCommand::class);

        $transactionMock->expects($this->once())->method('start');
        $repository->expects($this->once())->method('find')->willReturn($countryMock);
        $countryMock->expects($this->once())->method('changeCountryDetails');
        $repository->expects($this->once())->method('save');
        $transactionMock->expects($this->once())->method('commit');

        $handler = new ChangeCountryDetailsCommandHandler($transactionMock, $repository);
        $handler->handle($commandMock);
    }
}
