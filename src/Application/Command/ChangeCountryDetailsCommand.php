<?php
declare(strict_types=1);

namespace App\Application\Command;

use App\Common\Application\AbstractCommand;
use App\Common\Application\IDeliberateCommand;

class ChangeCountryDetailsCommand extends AbstractCommand implements IDeliberateCommand
{
    protected int $id;
    protected int $callingCode;
    protected string $name;
    protected ?string $countryCode;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getCallingCode(): int
    {
        return $this->callingCode;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }


}