<?php

namespace Wstd\Domain\Models\BusinessArea;

use Wstd\Domain\Models\EntityInterface;
use Wstd\Domain\Models\City\CityInterface;
use Wstd\Domain\Models\Prefecture\PrefectureInterface;

interface BusinessAreaInterface extends EntityInterface
{
    public function getName(): string;
    public function getPrefecture(): PrefectureInterface;
    public function getCity(): ?CityInterface;
    public function contains(CityInterface $city): bool;
}
