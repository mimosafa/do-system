<?php

namespace Wstd\Domain\Models\BusinessArea;

use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\Municipality\MunicipalityInterface;
use Wstd\Domain\Models\Prefecture\PrefectureInterface;

interface BusinessAreaInterface extends EntityInterface
{
    public function getName(): string;
    public function getPrefecture(): PrefectureInterface;
    public function getMunicipality(): ?MunicipalityInterface;
    public function contains(MunicipalityInterface $city): bool;
    public function __toString();
}
