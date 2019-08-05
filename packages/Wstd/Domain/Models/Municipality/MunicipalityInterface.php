<?php

namespace Wstd\Domain\Models\Municipality;

use Wstd\Domain\Models\BusinessArea\BusinessAreaInterface;
use Wstd\Domain\Models\Prefecture\PrefectureInterface;

interface MunicipalityInterface
{
    public function getId(): int;
    public function getCode(): string;
    public function getName(): string;
    public function getNameKana(): string;
    public function getCountryOrCityName(): string;
    public function getTownOrWardName(): string;
    public function getFullName(): string;
    public function getPrefecture(): PrefectureInterface;
    public function getDivision(): MunicipalityValueDivisions;
    public function getBusinessArea(): ?BusinessAreaInterface;

    /**
     * @return Wstd\Domain\Models\Prefecture\PrefectureInterface|Wstd\Domain\Models\City\CityInterface
     */
    public function getHealthManagementAdministration();

    public function __toString();
}
