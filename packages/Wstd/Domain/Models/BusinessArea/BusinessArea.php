<?php

namespace Wstd\Domain\Models\BusinessArea;

use Wstd\Domain\Models\City\CityInterface;
use Wstd\Domain\Models\City\CityRepositoryInterface;
use Wstd\Domain\Models\Prefecture\PrefectureInterface;
use Wstd\Domain\Models\Prefecture\PrefectureRepositoryInterface;
use Wstd\Infrastructure\Eloquents\BusinessArea as Eloquent;

final class BusinessArea implements BusinessAreaInterface
{
    private $eloquent;

    /**
     * @param mixed $eloquent
     */
    public function __construct($eloquent)
    {
        if (!($eloquent instanceof Eloquent)) {
            $eloquent = Eloquent::findOrFail($eloquent);
        }

        $this->eloquent = $eloquent;
    }

    public function getId(): int
    {
        return $this->eloquent->id;
    }

    public function getName(): string
    {
        if ($city = $this->getCity()) {
            return $this->makeNameString($city);
        }
        return $this->makeNameString($this->getPrefecture());
    }

    public function getPrefecture(): PrefectureInterface
    {
        $repository = resolve(PrefectureRepositoryInterface::class);
        return $repository->findById($this->eloquent->prefecture_id);
    }

    public function getCity(): ?CityInterface
    {
        if (!$cityId = $this->eloquent->city_id) {
            return null;
        }

        $repository = resolve(CityRepositoryInterface::class);
        return $repository->findById($cityId);
    }

    /**
     * @todo
     */
    public function contains(CityInterface $city): bool
    {
        return false;
    }

    private function makeNameString($cityOrPref): string
    {
        $string = e($cityOrPref);
        $safix = mb_substr($string, -1);
        return sprintf('%s (%s内一円)', $string, $safix);
    }
}
