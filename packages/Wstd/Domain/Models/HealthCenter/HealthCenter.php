<?php

namespace Wstd\Domain\Models\HealthCenter;

use Wstd\Domain\Models\BusinessArea\BusinessAreaInterface;
use Wstd\Domain\Models\BusinessArea\BusinessAreaRepositoryInterface;
use Wstd\Domain\Models\Municipality\MunicipalityInterface;
use Wstd\Domain\Models\Municipality\MunicipalityRepositoryInterface;
use Wstd\Domain\Models\Prefecture\PrefectureInterface;
use Wstd\Domain\Models\Prefecture\PrefectureRepositoryInterface;

final class HealthCenter implements HealthCenterInterface
{
    /**
     * @var int
     */
    private $health_center_id;
    private $prefecture_id;
    private $city_id;

    /**
     * @var string
     */
    private $administration_type;

    /**
     * @var string
     */
    private $health_center_name;

    public function __construct(array $arguments)
    {
        extract($arguments);

        $this->health_center_id = $health_center_id;
        $this->prefecture_id = $prefecture_id;
        $this->city_id = $city_id;
        $this->administration_type = $administration_type;
        $this->health_center_name = $health_center_name;
    }

    public function getId(): int
    {
        return $this->health_center_id;
    }

    public function getName(): string
    {
        return $this->health_center_name;
    }

    public function getAdministration()
    {
        if ($this->administration_type === 'city') {
            return $this->getMunicipality();
        }
        else if ($this->administration_type === 'prefecture') {
            return $this->getPrefecture();
        }
    }

    public function getPrefecture(): PrefectureInterface
    {
        $repository = resolve(PrefectureRepositoryInterface::class);
        return $repository->findById($this->prefecture_id);
    }

    public function getMunicipality(): MunicipalityInterface
    {
        $repository = resolve(MunicipalityRepositoryInterface::class);
        return $repository->findById($this->city_id);
    }

    public function getBusinessArea(): BusinessAreaInterface
    {
        //
    }

    public function __toString()
    {
        return $this->getName();
    }
}
