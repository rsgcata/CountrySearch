<?php
declare(strict_types=1);

namespace App\Domain;

use Doctrine\ORM\Mapping as ORM;
use App\Infrastructure\Domain\CountryRepository;

/**
 * @ORM\Entity(repositoryClass=CountryRepository::class)
 * @ORM\Table(name="countries")
 */
class Country implements \JsonSerializable
{
    const COUNTRY_NAME_MAX_LENGTH = 64;
    const COUNTRY_NAME_MIN_LENGTH = 2;
    const COUNTRY_CODE_FIXED_LENGTH = 2;
    const CALLING_CODE_MIN = 0;
    const CALLING_CODE_MAX = 2000;

    /**
     * @ORM\Id
     * @ORM\Column(type="smallint")
     * @ORM\GeneratedValue
     */
    protected int $id;

    /**
     * UTF-8 length 64 as an optimistic max length * 3 bytes
     * Can be optimised further by looping over all values and check the length in bytes
     * @ORM\Column(type="string", length="192")
     */
    protected string $name;

    /**
     * Length
     * @ORM\Column(type="string", length=2, options={"fixed" = true}, unique=true, nullable=true)
     */
    protected ?string $countryCode;

    /**
     * SQlite does not support unsigned option but signed
     * smallint is enough for a 4 digits number
     * @ORM\Column(type="smallint")
     */
    protected int $callingCode;

    private function __construct()
    {
    }

    public function changeCountryDetails(
        string $name,
        ?string $countryCode,
        int $callingCode
    ): void
    {
        $this->setCallingCode($callingCode);
        $this->setCountryCode($countryCode);
        $this->setName($name);
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'countryCode' => $this->countryCode,
            'callingCode' => $this->callingCode
        ];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    protected function setName(string $name): void
    {
        $name = trim(mb_ereg_replace('[\s\t\n]{2,}', ' ', $name));
        $nameLen = mb_strlen($name);

        $matchFound = preg_match('/^([\pL\s]+\'*,*)+$/u', $name);
        if ($nameLen < self::COUNTRY_NAME_MIN_LENGTH
            || $nameLen > self::COUNTRY_NAME_MAX_LENGTH
            || in_array($matchFound, [0, false])) {
            throw new \DomainException('Could not set country name. Invalid name.');
        }

        $this->name = mb_convert_case($name, MB_CASE_TITLE, "UTF-8");
    }

    /**
     * @return ?string
     */
    public function getCountryCode(): ?string
    {
        return $this->countryCode;
    }

    /**
     * @param string $countryCode
     */
    protected function setCountryCode(?string $countryCode): void
    {
        if($countryCode !== null)  {
            $countryCode = trim($countryCode);

            if (mb_strlen($countryCode) > self::COUNTRY_CODE_FIXED_LENGTH
                || !ctype_alpha($countryCode)) {
                throw new \DomainException('Could not set country code. Invalid code.');
            }

            $countryCode = strtoupper($countryCode);
        }

        $this->countryCode = $countryCode;
    }

    /**
     * @return mixed
     */
    public function getCallingCode(): int
    {
        return $this->callingCode;
    }

    /**
     * @param mixed $callingCode
     */
    protected function setCallingCode(int $callingCode): void
    {
        if ($callingCode < self::CALLING_CODE_MIN || $callingCode > self::CALLING_CODE_MAX) {
            throw new \DomainException('Could not set calling code. Invalid code.');
        }

        $this->callingCode = $callingCode;
    }


}