<?php

namespace Wstd\Domain\Models\HealthCenter;

use Wstd\Domain\Models\City\CityInterface;
use Wstd\Domain\Models\Prefecture\PrefectureInterface;

interface HealthCenterInterface
{
    public function getId(): int;

    public function getName(): string;

    public function getAdministration();
    public function getPrefecture(): PrefectureInterface;
    public function getCity(): CityInterface;

    public function __toString();
}
