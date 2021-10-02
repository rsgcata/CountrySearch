<?php
declare(strict_types=1);

namespace App\Application\Command;

use App\Common\Application\InvalidCommandException;
use App\Common\Application\ITransaction;
use App\Domain\ICountryRepository;

class ChangeCountryDetailsCommandHandler
{
    private ITransaction $transaction;
    private ICountryRepository $countryRepository;

    /**
     * ChangeCountryDetailsCommandHandler constructor.
     *
     * @param ITransaction $transaction
     * @param ICountryRepository $countryRepository
     */
    public function __construct(ITransaction $transaction, ICountryRepository $countryRepository)
    {
        $this->transaction = $transaction;
        $this->countryRepository = $countryRepository;
    }

    /**
     * NOTE Transaction is not really required. This is just an example how transactions
     *      can be used inside a command handler. Generally here is where transaction logic
     *      should reside
     *
     * @throws InvalidCommandException
     * @throws \Throwable
     */
    public function handle(ChangeCountryDetailsCommand $command): void
    {
        $this->transaction->start();

        try {
            $country = $this->countryRepository->find($command->getId());

            $country->changeCountryDetails(
                $command->getName(), $command->getCountryCode(), $command->getCallingCode()
            );

            $this->countryRepository->save($country);
            $this->transaction->commit();
        } catch (\Throwable $e) {
            $this->transaction->rollBack();
        }
    }
}