<?php

namespace Wstd\Domain\Models\City;

use Wstd\Domain\Models\Prefecture\PrefectureInterface;

interface CityInterface
{
    public function getId(): int;

    public function getName(): string;

    public function getCountryOrCityName(): string;
    public function getTownOrWardName(): string;
    public function getFullName(): string;

    public function getPrefecture(): PrefectureInterface;

    public function __toString();
}
