<?php

namespace Wstd\Domain\Models\Municipality;

use Wstd\Domain\Models\BusinessArea\BusinessAreaInterface;
use Wstd\Domain\Models\BusinessArea\BusinessAreaRepositoryInterface;
use Wstd\Domain\Models\Prefecture\PrefectureInterface;
use Wstd\Domain\Models\Prefecture\PrefectureRepositoryInterface;

final class Municipality implements MunicipalityInterface
{
    /**
     * @var int
     */
    private $municipality_id;
    private $prefecture_id;

    /**
     * @var string
     */
    private $municipality_code;
    private $municipality_name;
    private $municipality_name_kana;
    private $country_or_city_name;
    private $town_or_ward_name;

    /**
     * @var Wstd\Domain\Models\Municipality\MunicipalityValueDivisions
     */
    private $administrative_division;

    public function __construct(array $arguments)
    {
        extract($arguments);

        $this->municipality_id = $municipality_id;
        $this->prefecture_id = $prefecture_id;
        $this->municipality_code = $municipality_code;
        $this->municipality_name = $municipality_name;
        $this->municipality_name_kana = $municipality_name_kana;
        $this->country_or_city_name = $country_or_city_name;
        $this->town_or_ward_name = $town_or_ward_name;

        $this->administrative_division = $administrative_division;
    }

    public function getId(): int
    {
        return $this->municipality_id;
    }

    public function getCode(): string
    {
        return $this->municipality_code;
    }

    public function getName(): string
    {
        return $this->municipality_name;
    }

    public function getNameKana(): string
    {
        return $this->municipality_name_kana;
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

    public function getDivision(): MunicipalityValueDivisions
    {
        return MunicipalityValueDivisions::of($this->administrative_division);
    }

    public function getBusinessArea(): ?BusinessAreaInterface
    {
        $repository = resolve(BusinessAreaRepositoryInterface::class);
        $administration = $this->getHealthManagementAdministration();
        if ($administration instanceof self) {
            return $repository->findByMunicipality($this->getHealthManagementAdministration());
        }
        return $repository->findByPrefecture($administration);
    }

    /**
     * @return Wstd\Domain\Models\Prefecture\PrefectureInterface|Wstd\Domain\Models\City\CityInterface
     */
    public function getHealthManagementAdministration()
    {
        $division = $this->getDivision();
        if ($division->isWard()) {
            $repository = resolve(MunicipalityRepositoryInterface::class);
            $designatedCityId = (int) (substr($this->getCode(), 0, 3) . '00');

            return $repository->findById($designatedCityId);
        }
        if ($division->isDesignatedCity() || $division->isCoreCity() || $division->isHealth()) {
            return $this;
        }
        return $this->getPrefecture();
    }

    public function __toString()
    {
        return $this->getName();
    }
}
