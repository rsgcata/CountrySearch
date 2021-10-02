<?php
declare(strict_types=1);

namespace App\Tests\Unit\Domain;

use App\Domain\Country;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase
{
    private MockObject $countryMock;

    protected function setUp(): void
    {
        $this->countryMock = $this->buildCountryMock();
    }

    private function buildCountryMock(
        $name = 'Rambo',
        $countryCode = 'TY',
        $callingCode = 555
    ): MockObject
    {
        $constructorFn = function() use ($name, $countryCode, $callingCode) {
            $this->name = $name;
            $this->countryCode = $countryCode;
            $this->callingCode = $callingCode;
        };

        $newCountry = $this->getMockBuilder(Country::class)
            ->disableOriginalConstructor()
            ->onlyMethods([])
            ->getMock();

        $constructor = $constructorFn->bindTo($newCountry, $newCountry);
        $constructor();

        return $newCountry;
    }

    public function acceptedCountryDetails(): array
    {
        return [
            'all details with values' => [
                'Romania',
                'ro',
                40
            ],
            'nullable country code' => [
                'Romania',
                null,
                40
            ],
            'name with diacritics' => [
                'çàÈÔÖ',
                null,
                40
            ],
            'name with allowed punctuation' => [
                'çàÈÔÖ',
                null,
                40
            ]
        ];
    }

    /**
     * @dataProvider acceptedCountryDetails
     */
    public function testCountryDetailsChangeSucceedsWithAcceptedDetails(
        string $name, ?string $countryCode, int $callingCode
    )
    {
        $oldName = $this->countryMock;
        $oldCountryCode = $this->countryMock->getCountryCode();
        $oldCallingCode = $this->countryMock->getCallingCode();
        $this->countryMock->changeCountryDetails($name, $countryCode, $callingCode);

        $this->assertNotSame($this->countryMock->getName(), $oldName);
        $this->assertNotSame($this->countryMock->getCallingCode(), $oldCountryCode);
        $this->assertNotSame($this->countryMock->getCountryCode(), $oldCallingCode);
    }

    public function nameTrimDataProvider(): array
    {
        return [
            'spaces in name are trimmed' => [
                'Ro',
                '       ro   '
            ],
            'line feed in name are removed' => [
                'Ro',
                "\nro\n"
            ],
            'CRLF in name are removed' => [
                'Ro',
                "\r\nro\r\n"
            ],
            'tabs in name are removed' => [
                'Ro',
                "\tro\t"
            ],
            'multiple spaces in name are unified' => [
                'Ro Ma Ni A',
                "ro ma  ni      a"
            ]
        ];
    }

    /**
     * @dataProvider nameTrimDataProvider
     */
    public function testNameIsTrimmedWhenNameChanges($expectedResult, $input)
    {
        $this->countryMock->changeCountryDetails(
            $input, $this->countryMock->getCountryCode(), $this->countryMock->getCallingCode()
        );
        $this->assertSame($expectedResult, $this->countryMock->getName());
    }

    public function invalidNameProvider()
    {
        return [
            'long name' => [
                str_repeat('x', Country::COUNTRY_NAME_MAX_LENGTH + 1)
            ],
            'short name' => [
                str_repeat('x', Country::COUNTRY_NAME_MIN_LENGTH - 1)
            ],
            'name with numbers' => [
                'Eur0p4'
            ],
            'name with invalid punctuation' => [
                'Cote D+ivoire'
            ]
        ];
    }

    /**
     * @dataProvider invalidNameProvider
     */
    public function testChangeCountryDetailsFailsWhenNameTooLong($name)
    {
        $this->expectException(\DomainException::class);
        $this->expectExceptionMessage('Could not set country name');

        $this->countryMock->changeCountryDetails(
            $name, $this->countryMock->getCountryCode(), $this->countryMock->getCallingCode()
        );
    }

    // TODO More code coverage for country tests
}
