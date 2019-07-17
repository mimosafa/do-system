<?php

namespace Wstd\Domain\Models\City;

use Wstd\Domain\Models\Prefecture\PrefectureInterface;
use Wstd\Domain\Models\Prefecture\PrefectureRepositoryInterface;

final class City implements CityInterface
{
    /**
     * @var int
     */
    private $city_id;
    private $prefecture_id;

    /**
     * @var string
     */
    private $municipality_name;
    private $country_or_city_name;
    private $town_or_ward_name;

    public function __construct(array $arguments)
    {
        extract($arguments);

        $this->city_id = $city_id;
        $this->prefecture_id = $prefecture_id;
        $this->municipality_name = $municipality_name;
        $this->country_or_city_name = $country_or_city_name;
        $this->town_or_ward_name = $town_or_ward_name;
    }

    public function getId(): int
    {
        return $this->city_id;
    }

    public function getName(): string
    {
        return $this->municipality_name;
    }

    public function getCountryOrCityName(): string
    {
        return $this->country_or_city_name;
    }

    public function getTownOrWardName(): string
    {
        return $this->town_or_ward_name;
    }

    public function getFullName(): string
    {
        return $this-> getCountryOrCityName() . $this->getTownOrWardName();
    }

    public function getPrefecture(): PrefectureInterface
    {
        $repository = resolve(PrefectureRepositoryInterface::class);
        return $repository->findById($this->prefecture_id);
    }

    public function __toString()
    {
        return $this->getName();
    }
}
