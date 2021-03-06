<?php

namespace Wstd\Domain\Models\HealthCenter;

use JsonSerializable;
use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\BusinessArea\BusinessAreaInterface;
use Wstd\Domain\Models\Municipality\MunicipalityInterface;
use Wstd\Domain\Models\Prefecture\PrefectureInterface;

interface HealthCenterInterface extends JsonSerializable, EntityInterface
{
    public function getName(): string;

    public function getAdministration();
    public function getPrefecture(): PrefectureInterface;
    public function getMunicipality(): MunicipalityInterface;
    public function getBusinessArea(): ?BusinessAreaInterface;

    public function __toString();
}
