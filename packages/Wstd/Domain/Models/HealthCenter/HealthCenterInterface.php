<?php

namespace Wstd\Domain\Models\HealthCenter;

use Wstd\Domain\Models\BusinessArea\BusinessAreaInterface;
use Wstd\Domain\Models\Municipality\MunicipalityInterface;
use Wstd\Domain\Models\Prefecture\PrefectureInterface;

interface HealthCenterInterface
{
    public function getId(): int;

    public function getName(): string;

    public function getAdministration();
    public function getPrefecture(): PrefectureInterface;
    public function getMunicipality(): MunicipalityInterface;
    public function getBusinessArea(): ?BusinessAreaInterface;

    public function __toString();
}
